<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class AdminStrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listStruktur = StrukturOrganisasi::with("dosen")->get();
        return view("admin.struktur.index", [
            "title" => "Data Struktur Organisasi",
            "listStruktur" => $listStruktur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.struktur.create", [
            "title" => "Tambah Jabatan",
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
            "jabatan" => "required",
            "dosen_id" => "required"
        ]);

        StrukturOrganisasi::create($validatedData);

        return redirect("/admin/struktur")->with("success", "Data Jabatan Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(StrukturOrganisasi $struktur)
    {
        return view("admin.struktur.edit", [
            "title" => "Data struktur",
            "struktur" => $struktur,
            "listDosen" => Dosen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StrukturOrganisasi $struktur)
    {
        $validatedData = $request->validate([
            "jabatan" => "required",
            "dosen_id" => "required"
        ]);

        StrukturOrganisasi::where("id", $struktur->id)->update($validatedData);

        return redirect("/admin/struktur")->with("success", "Data Jabatan Berhasil Diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturOrganisasi $struktur)
    {
        StrukturOrganisasi::destroy($struktur->id);
        return redirect("/admin/struktur")->with("success", "Data Jabatan Berhasil Dihapus");
    }
}
