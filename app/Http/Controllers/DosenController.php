<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $listMatakuliah = Matakuliah::with("listDosen")->orderBy('nama')->get();
        return view("dosen.index", [
            "title" => "Data Dosen",
            "listMatakuliah" => $listMatakuliah
        ]);
    }

    public function show(Matakuliah $matakuliah)
    {
        $listDosen = $matakuliah->listDosen;

        return view('dosen.show', [
            "title" => "Daftar Dosen " . $matakuliah->nama,
            "listDosen" => $listDosen
        ]);
    }
}
