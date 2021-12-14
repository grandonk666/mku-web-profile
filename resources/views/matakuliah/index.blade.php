@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => asset("matakuliah-hero.jpg"),
  "keywords" => "mku, matakuliah, upn, jatim",
  "description" => "Data Matakuliah yang ada di Matakuliah Umum Universitas
  Pembangunan Nasional Veteran Jawa Timur"
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => "Data Matakuliah",
  "image" => asset("matakuliah-hero.jpg")
  ])

  <main class="container mx-auto min-h-screen py-12 px-4 md:px-10">
    <div class="mb-10">
      @include("partials.section-title", ["text" => "Daftar Matakuliah MKU"])
    </div>

    <div class="flex justify-between md:px-6 items-center flex-wrap gap-10">
      @foreach ($listMatakuliah as $matakuliah)
        @include('partials.matakuliah-card', [
        'route' => route('matakuliah.show', $matakuliah),
        'headerText' => 'Matakuliah',
        'bodyText' => $matakuliah->nama,
        'icon' => 'fa-book'
        ])
      @endforeach
    </div>

  </main>

@endsection
