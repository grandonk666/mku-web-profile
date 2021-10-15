<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMatakuliah = Matakuliah::with("listDosen")->get();
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
        $validatedData = $request->validate([
            "nama" => "required",
            "slug" => "required|unique:matakuliahs",
            "detail" => "required"
        ]);

        Matakuliah::create($validatedData);

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
            "detail" => "required"
        ];

        if ($request->slug != $matakuliah->slug)
        {
            $rules["slug"] = "required|unique:matakuliahs";
        }

        $validatedData = $request->validate($rules);

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
