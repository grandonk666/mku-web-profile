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
  "text" => "Data Dosen",
  "image" => asset("dosen-hero.jpg")
  ])

  <main class="container mx-auto min-h-screen py-12 px-4 md:px-10">
    <div class="mb-10">
      @include("partials.section-title", ["text" => "Data Dosen MKU"])
    </div>

    <div class="flex justify-between md:px-6 items-center flex-wrap gap-10">
      @foreach ($listMatakuliah as $matakuliah)
        @include('partials.matakuliah-card', [
        'route' => route('dosen.show', $matakuliah),
        'headerText' => 'Dosen',
        'bodyText' => $matakuliah->nama,
        'icon' => 'fa-user-tie'
        ])
      @endforeach
    </div>

  </main>

@endsection
