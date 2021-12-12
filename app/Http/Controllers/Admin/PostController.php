<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with("kategori")->latest()->filter(request(["search", "kategori"]))->paginate(5)->withQueryString();

        return view("admin.post.index", [
            "title" => "Data Post Berita & Pengumuman",
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.post.create", [
            "title" => "Tambah Post",
            "listKategori" => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "judul" => "required|max:50",
            "slug" => "required|unique:posts",
            "kategori_id" => "required",
            "body" => "required",
            "sampul" => "image|file|max:1024",
            "file_support" => "mimes:pdf|max:1024"
        ];

        if ($request->file("file_support")) {
            $rules['file_name'] = "required";
        }

        $validatedData = $request->validate($rules);

        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 170, '...');

        if ($request->file("sampul")) {
            $validatedData["sampul"] = $request->file("sampul")->store("sampul-post");
        }

        if (isset($validatedData["file_support"])) {
            unset($validatedData["file_support"]);
        }
        if (isset($validatedData["file_name"])) {
            unset($validatedData["file_name"]);
        }

        $post = Post::create($validatedData);

        if ($request->attachments) {
            $attachments = [];
            if (count($request->attachments) > 1) {
                foreach ($request->attachments as $attachment) {
                    array_push($attachments, ["filename" => $attachment]);
                }

                $post->attachments()->createMany($attachments);
            } else {
                $attachments["filename"] = $request->attachments[0];
                $post->attachments()->create($attachments);
            }
        }

        if ($request->file("file_support")) {
            $filenamewithextension = $request->file('file_support')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('file_support')->getClientOriginalExtension();
            $filenametostore = $filename . 'date' . time() . '.' . $extension;
            $path = $request->file('file_support')->storeAs("file-support", $filenametostore);

            $post->file_support()->create(['path' => $path, 'filename' => $request->file_name]);
        }

        return redirect("/admin/post")->with("success", "Data Post Berhasil Ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.post.edit", [
            "title" => "Data Post",
            "post" => $post,
            "listKategori" => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            "judul" => "required|max:50",
            "kategori_id" => "required",
            "body" => "required",
            "sampul" => "image|file|max:1024",
            "file_support" => "mimes:pdf|max:1024"
        ];

        if ($request->slug != $post->slug) {
            $rules["slug"] = "required|unique:posts";
        }

        if ($request->file("file_support") || $post->file_support) {
            $rules['file_name'] = "required";
        }

        $validatedData = $request->validate($rules);

        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 170, '...');

        if ($request->file("sampul")) {
            if ($request->oldSampul) {
                Storage::delete($request->oldSampul);
            }
            $validatedData["sampul"] = $request->file("sampul")->store("sampul-post");
        }

        if (isset($validatedData["file_support"])) {
            unset($validatedData["file_support"]);
        }
        if (isset($validatedData["file_name"])) {
            unset($validatedData["file_name"]);
        }

        if ($request->file("file_support")) {
            Storage::delete($post->file_support->filename);
            $post->file_support->delete();

            $filenamewithextension = $request->file('file_support')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('file_support')->getClientOriginalExtension();
            $filenametostore = $filename . 'date' . time() . '.' . $extension;
            $path = $request->file('file_support')->storeAs("file-support", $filenametostore);

            $post->file_support()->create(['path' => $path, 'filename' => $request->file_name]);
        }

        if ($request->file_name && $post->file_support) {
            $post->file_support->filename = $request->file_name;
            $post->file_support->save();
        }

        Post::where("id", $post->id)->update($validatedData);

        return redirect("/admin/post")->with("success", "Data Post Berhasil Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->sampul) {
            Storage::delete($post->sampul);
        }

        Post::destroy($post->id);
        return redirect("/admin/post")->with("success", "Data Post Berhasil Dihapus");
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->from);
        return response()->json(["slug" => $slug]);
    }
}
