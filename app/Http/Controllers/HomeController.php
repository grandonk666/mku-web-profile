<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Post;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with("kategori")->orderByDesc('created_at')->limit(3)->get();
        return view('index', [
            "title" => "Home",
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
}
