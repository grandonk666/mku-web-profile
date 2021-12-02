@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => asset("dosen-hero.jpg"),
  "keywords" => "mku, dosen, upn, jatim",
  "description" => "Data Dosen Matakuliah Umum Universitas Pembangunan Nasional
  Veteran Jawa Timur"
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => $title,
  "image" => asset("dosen-hero.jpg")
  ])

  <main class="container mx-auto min-h-screen py-12 px-2">
    <div class="mb-10">
      @include("partials.section-title", ["text" => $title])
    </div>

    <div class="flex items-stretch flex-wrap justify-between">
      @forelse ($listDosen as $dosen)
        @include("partials.foto-dosen", [
        "dosen" => $dosen,
        "class" => "w-11/12 md:w-[18%]",
        'keterangan' => $dosen->keterangan
        ])
      @empty
        <h2 class="text-4xl font-bold">Belum Ada Dosen Pengajar</h2>
      @endforelse
    </div>

  </main>

@endsection
