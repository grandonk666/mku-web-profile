<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDosen = Dosen::with(["matakuliah", "struktur"])->orderBy('nama')->filter(request(["search", "matakuliah"]))->paginate(10)->withQueryString();
        $listMatakuliah = Matakuliah::with("listDosen")->orderBy('nama')->get();

        return view("admin.dosen.index", [
            "title" => "Data Dosen",
            "listDosen" => $listDosen,
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
        return view("admin.dosen.create", [
            "title" => "Tambah Data Dosen",
            "listMatakuliah" => Matakuliah::all()
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
        // dd($request);
        $validatedData = $request->validate([
            "nama" => "required",
            "foto" => "image|file|max:1024"
        ]);

        if ($request->nip) {
            $validatedData["nip"] = $request->nip;
        }
        if ($request->file("foto")) {
            $validatedData["foto"] = $request->file("foto")->store("foto-dosen");
        }

        $dosen = Dosen::create($validatedData);
        if ($request->matakuliah_id) {
            $dosen->matakuliah()->attach($request->matakuliah_id);
        }

        return redirect("/admin/dosen")->with("success", "Data Dosen Berhasil Ditambahkan");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $listMatakuliah = Matakuliah::all();
        $dosenMatakuliahIds = array_column($dosen->matakuliah->toArray(), 'id');
        return view("admin.dosen.edit", [
            "title" => "Data Dosen",
            "dosen" => $dosen,
            'dosenMatakuliahIds' => $dosenMatakuliahIds,
            "listMatakuliah" => $listMatakuliah
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

        if ($request->nip) {
            $validatedData["nip"] = $request->nip;
        }
        if ($request->file("foto")) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData["foto"] = $request->file("foto")->store("foto-dosen");
        }

        Dosen::where("id", $dosen->id)->update($validatedData);

        if ($request->matakuliah_id) {
            $dosen->matakuliah()->sync($request->matakuliah_id);
        }

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
