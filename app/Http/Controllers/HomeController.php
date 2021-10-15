<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Post;
use App\Models\StrukturOrganisasi;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with("kategori")->latest()->take(3)->get();
        return view('index', [
            "title" => "Matakuliah Umum",
            "posts" => $posts
        ]);
    }

    public function profil()
    {
        return view('profil', [
            "title" => "Profil",
        ]);
    }

    public function struktur()
    {
        $koordinator = StrukturOrganisasi::with("dosen")->where("jabatan", "Koordinator")->first();
        $struktur = StrukturOrganisasi::with("dosen")->get();
        $struktur = $struktur->except([$koordinator->id]);

        return view('struktur', [
            "title" => "Struktur Organisasi",
            "koordinator" => $koordinator,
            "listStruktur" => $struktur
        ]);
    }

    public function dosen()
    {
        $listDosen = Dosen::all();

        return view('dosen', [
            "title" => "Data Dosen",
            "listDosen" => $listDosen
        ]);
    }

    public function matakuliah()
    {
        $listMatakuliah = Matakuliah::all();

        return view('matakuliah', [
            "title" => "Matakuliah",
            "listMatakuliah" => $listMatakuliah
        ]);
    }
}
