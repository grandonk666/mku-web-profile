@extends("layouts.main")

@section("meta")

@include("partials.site-meta", [
  "title" => $title,
  "image" => asset("dosen-hero.jpg"),
  "keywords" => "mku, dosen, upn, jatim",
  "description" => "Data Dosen Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur"
])

@endsection

@section("content")

@include("partials.hero-section", [
  "text" => "Data Dosen",
  "image" => asset("dosen-hero.jpg")
])

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-10">
    @include("partials.section-title", ["text" => "Daftar Dosen MKU"])
  </div>

  <div class="flex justify-center items-stretch flex-wrap gap-10">
    @foreach ($listDosen as $dosen)
      @include("partials.foto-dosen", [
        "dosen" => $dosen,
        "width" => "w-11/12 md:w-[28%]"
      ])
    @endforeach
  </div>

</main>

@endsection