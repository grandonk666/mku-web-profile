@extends("layouts.main")

@section("meta")

@include("partials.site-meta", [
  "title" => $title,
  "image" => asset("struktur-hero.jpg"),
  "keywords" => "mku, struktur organisasi, organisasi, upn, jatim",
  "description" => "Struktur Organisasi Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur"
])

@endsection

@section("content")

@include("partials.hero-section", [
  "text" => "Struktur Organisasi",
  "image" => asset("struktur-hero.jpg")
])

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-10">
    @include("partials.section-title", ["text" => "Struktur Organisasi"])
  </div>
  
  @include("partials.foto-dosen", [
    "dosen" => $koordinator->dosen,
    "width" => "w-11/12 md:w-1/3",
    "jabatan" => $koordinator->jabatan
  ])
  <div class="flex justify-center items-center flex-wrap gap-8">
    @foreach ($listStruktur as $struktur)
      @include("partials.foto-dosen", [
        "dosen" => $struktur->dosen,
        "width" => "w-11/12 md:w-[28%]",
        "jabatan" => $struktur->jabatan
      ])
    @endforeach
  </div>

</main>

@endsection