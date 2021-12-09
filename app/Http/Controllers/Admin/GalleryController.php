<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view("admin.gallery.index", [
            "title" => "Data Gallery",
            "galleries" => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.gallery.create", [
            "title" => "Tambah Foto Gallery",
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
            "caption" => "required",
            "image" => "required|image|file|max:1024"
        ]);
        $validatedData["image"] = $request->file("image")->store("gallery");

        Gallery::create($validatedData);

        return redirect("/admin/gallery")->with("success", "Foto Gallery Berhasil Ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view("admin.gallery.edit", [
            "title" => "Tambah Foto Gallery",
            'gallery' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            "caption" => "required",
            "image" => "image|file|max:1024"
        ]);

        if ($request->file("image")) {
            Storage::delete($request->oldImage);
            $validatedData["image"] = $request->file("image")->store("gallery");
        };

        Gallery::where("id", $gallery->id)->update($validatedData);

        return redirect("/admin/gallery")->with("success", "Foto Gallery Berhasil Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Gallery::destroy($gallery->id);
        Storage::delete($gallery->image);
        return redirect("/admin/gallery")->with("success", "Foto Gallery Berhasil Dihapus");
    }
}
