<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
  public function index()
  {
    $listMatakuliah = Matakuliah::with("listDosen")->orderBy('nama')->get();
    return view("matakuliah.index", [
      "title" => "Data Matakuliah",
      "listMatakuliah" => $listMatakuliah
    ]);
  }

  public function show(Matakuliah $matakuliah)
  {
    $listMatakuliah = Matakuliah::with("listDosen")->orderBy('nama')->get()->filter(function ($list) use ($matakuliah) {
      return $list->id != $matakuliah->id;
    })->take(5);

    return view("matakuliah.show", [
      "title" => $matakuliah->nama,
      "matakuliah" => $matakuliah,
      "listMatakuliah" => $listMatakuliah
    ]);
  }
}
