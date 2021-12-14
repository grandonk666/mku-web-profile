@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => asset("struktur-hero.jpg"),
  "keywords" => "mku, struktur organisasi, organisasi, upn, jatim",
  "description" => "Struktur Organisasi Matakuliah Umum Universitas Pembangunan
  Nasional Veteran Jawa Timur"
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => "Struktur Organisasi",
  "image" => asset("struktur-hero.jpg")
  ])

  <main class="container mx-auto min-h-screen py-12 px-4 md:px-10">
    <div class="mb-8">
      @include("partials.section-title", ["text" => "Bagan Organisasi Pengelola
      MKU"])
    </div>
    <div
      class="mb-10 w-full rounded-md overflow-hidden shadow-md p-1 md:p-4 bg-white">
      <img class="w-full h-auto" src="{{ asset('bagan-mku.svg') }}" alt="">
    </div>

    <div class="mb-8">
      @include("partials.section-title", ["text" => "Dosen Pengelola MKU"])
    </div>

    @include("partials.foto-dosen", [
    "dosen" => $koordinator->dosen,
    "class" => "w-11/12 md:w-[30%] mx-auto",
    "keterangan" => $koordinator->jabatan
    ])
    <div class="flex items-stretch flex-wrap justify-between">
      @foreach ($listStruktur as $struktur)
        @include("partials.foto-dosen", [
        "dosen" => $struktur->dosen,
        "class" => "w-11/12 md:w-[24%]",
        "keterangan" => $struktur->jabatan
        ])
      @endforeach
    </div>

  </main>

@endsection
