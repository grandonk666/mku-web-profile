<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AdminMatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMatakuliah = Matakuliah::with("dosen")->get();
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
            "listDosen" => Dosen::all()
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
            "kode" => "required|unique:matakuliahs",
            "dosen_id" => "required"
        ]);

        Matakuliah::create($validatedData);

        return redirect("/admin/matakuliah")->with("success", "Data Matakuliah Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        //
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
            "dosen_id" => "required"
        ];

        if ($request->kode != $matakuliah->kode)
        {
            $rules["kode"] = "required|unique:matakuliahs";
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
}
