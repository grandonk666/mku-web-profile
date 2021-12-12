<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMatakuliah = Matakuliah::with("listDosen")->orderBy('nama')->get();
        return view("admin.matakuliah.index", [
            "title" => "Data Matakuliah",
            "listMatakuliah" => $listMatakuliah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.matakuliah.create", [
            "title" => "Tambah Data Matakuliah",
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
            "nama" => "required",
            "slug" => "required|unique:matakuliahs",
            "detail" => "required",
            "file_support" => "mimes:pdf|max:1024"
        ];

        if ($request->file("file_support")) {
            $rules['file_name'] = "required";
        }

        $validatedData = $request->validate($rules);

        if (isset($validatedData["file_support"])) {
            unset($validatedData["file_support"]);
        }
        if (isset($validatedData["file_name"])) {
            unset($validatedData["file_name"]);
        }

        $matakuliah = Matakuliah::create($validatedData);

        if ($request->attachments) {
            $attachments = [];
            if (count($request->attachments) > 1) {
                foreach ($request->attachments as $attachment) {
                    array_push($attachments, ["filename" => $attachment]);
                }

                $matakuliah->attachments()->createMany($attachments);
            } else {
                $attachments["filename"] = $request->attachments[0];
                $matakuliah->attachments()->create($attachments);
            }
        }

        if ($request->file("file_support")) {
            $filenamewithextension = $request->file('file_support')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('file_support')->getClientOriginalExtension();
            $filenametostore = $filename . 'date' . time() . '.' . $extension;
            $path = $request->file('file_support')->storeAs("file-support", $filenametostore);

            $matakuliah->file_support()->create(['path' => $path, 'filename' => $request->file_name]);
        }

        return redirect()->route('admin.matakuliah.index')->with("success", "Data Matakuliah Berhasil Ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        return view("admin.matakuliah.edit", [
            "title" => "Data Matakuliah",
            "matakuliah" => $matakuliah,
            "listDosen" => Dosen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $rules = [
            "nama" => "required",
            "detail" => "required",
            "file_support" => "mimes:pdf|max:1024"
        ];

        if ($request->slug != $matakuliah->slug) {
            $rules["slug"] = "required|unique:matakuliahs";
        }

        if ($request->file("file_support") || $matakuliah->file_support) {
            $rules['file_name'] = "required";
        }

        $validatedData = $request->validate($rules);

        if (isset($validatedData["file_support"])) {
            unset($validatedData["file_support"]);
        }
        if (isset($validatedData["file_name"])) {
            unset($validatedData["file_name"]);
        }

        if ($request->file("file_support")) {
            Storage::delete($matakuliah->file_support->filename);
            $matakuliah->file_support->delete();

            $filenamewithextension = $request->file('file_support')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('file_support')->getClientOriginalExtension();
            $filenametostore = $filename . 'date' . time() . '.' . $extension;
            $path = $request->file('file_support')->storeAs("file-support", $filenametostore);

            $matakuliah->file_support()->create(['path' => $path, 'filename' => $request->file_name]);
        }

        if ($request->file_name && $matakuliah->file_support) {
            $matakuliah->file_support->filename = $request->file_name;
            $matakuliah->file_support->save();
        }

        Matakuliah::where("id", $matakuliah->id)->update($validatedData);

        return redirect("/admin/matakuliah")->with("success", "Data Matakuliah Berhasil Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        Matakuliah::destroy($matakuliah->id);
        return redirect("/admin/matakuliah")->with("success", "Data Matakuliah Berhasil Dihapus");
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Matakuliah::class, 'slug', $request->from);
        return response()->json(["slug" => $slug]);
    }
}
