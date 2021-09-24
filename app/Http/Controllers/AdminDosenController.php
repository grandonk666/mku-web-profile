<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDosen = Dosen::with(["matakuliah", "struktur"])->get();
        return view("admin.dosen.index", [
            "title" => "Data Matakuliah",
            "listDosen" => $listDosen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.dosen.create", [
            "title" => "Tambah Data Dosen",
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
            "foto" => "image|file|max:1024"
        ]);

        if ($request->nip)
        {
            $validatedData["nip"] = $request->nip;
        }
        if ($request->file("foto"))
        {
            $validatedData["foto"] = $request->file("foto")->store("foto-dosen");
        }

        Dosen::create($validatedData);

        return redirect("/admin/dosen")->with("success", "Data Dosen Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view("admin.dosen.edit", [
            "title" => "Data Dosen",
            "dosen" => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validatedData = $request->validate([
            "nama" => "required",
            "foto" => "image|file|max:1024"
        ]);

        if ($request->nip)
        {
            $validatedData["nip"] = $request->nip;
        }
        if ($request->file("foto"))
        {
            if ($request->oldFoto)
            {
                Storage::delete($request->oldFoto);
            }
            $validatedData["foto"] = $request->file("foto")->store("foto-dosen");
        }

        Dosen::where("id", $dosen->id)->update($validatedData);

        return redirect("/admin/dosen")->with("success", "Data Dosen Berhasil Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect("/admin/dosen")->with("success", "Data Dosen Berhasil Dihapus");
    }
}
