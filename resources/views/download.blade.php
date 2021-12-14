@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => asset("posts-hero.jpg"),
  "keywords" => "mku, dosen, upn, jatim",
  "description" => "Download File Matakuliah Umum Universitas Pembangunan Nasional
  Veteran Jawa Timur"
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => "Download File",
  "image" => asset("posts-hero.jpg")
  ])

  <main class="container mx-auto min-h-screen py-12 px-4 md:px-10">
    <div class="mb-10">
      @include("partials.section-title", ["text" => "Download File"])
    </div>

    <div class="flex justify-between md:px-6 items-center flex-wrap gap-12">
      @foreach ($files as $file)
        @include('partials.matakuliah-card', [
        'route' => asset('storage/'. $file->path),
        'headerText' => 'File',
        'bodyText' => $file->filename,
        'icon' => 'fa-file-alt'
        ])
      @endforeach
    </div>

  </main>

@endsection
