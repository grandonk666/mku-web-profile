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
        // dd(basename("http://localhost/storage/88lufrVKKNVpuNKHXB2FplPWCw5ApKdANHsIpTmm.png"));
        $posts = Post::with("kategori")->get();
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
        $validatedData = $request->validate([
            "judul" => "required",
            "slug" => "required|unique:posts",
            "kategori_id" => "required",
            "body" => "required",
            "sampul" => "image|file|max:1024"
        ]);

        $validatedData["excerpt"] = Str::limit(strip_tags($request->body), 200, '...');

        if ($request->file("sampul"))
        {
            $validatedData["sampul"] = $request->file("sampul")->store("sampul-post");
        }

        Post::create($validatedData);

        return redirect("/admin/post")->with("success", "Data Post Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
            "judul" => "required",
            "kategori_id" => "required",
            "body" => "required",
            "sampul" => "image|file|max:1024"
        ];

        if ($request->slug != $post->slug)
        {
            $rules["slug"] = "required|unique:posts";
        }

        $validatedData = $request->validate($rules);

        if ($request->file("sampul"))
        {
            if ($request->oldSampul)
            {
                Storage::delete($request->oldSampul);
            }
            $validatedData["sampul"] = $request->file("sampul")->store("sampul-post");
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
        if ($post->sampul)
        {
            Storage::delete($post->sampul);
        }

        Post::destroy($post->id);
        return redirect("/admin/post")->with("success", "Data Post Berhasil Dihapus");
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(["slug" => $slug]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file'))
        {
            //get filename with extension
            // $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            // $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            // $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            // $request->file('file')->storeAs('public/uploads', $filenametostore);

            // you can save image path below in database
            // $path = asset('storage/uploads/'.$filenametostore);

            $attachment = $request->file('file')->store("attachment");
            $path = asset("storage/" . $attachment);

            echo $path;
            exit;
        }
    }
}
