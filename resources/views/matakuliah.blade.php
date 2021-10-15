@extends("layouts.main")

@section("meta")

@include("partials.site-meta", [
  "title" => $title,
  "image" => asset("matakuliah-hero.jpg"),
  "keywords" => "mku, matakuliah, upn, jatim",
  "description" => "Data Matakuliah yang ada di Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur"
])

@endsection

@section("content")

@include("partials.hero-section", [
  "text" => "Data Matakuliah",
  "image" => asset("matakuliah-hero.jpg")
])

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-10">
    @include("partials.section-title", ["text" => "Daftar Matakuliah MKU"])
  </div>

  <div class="flex justify-between md:px-6 items-center flex-wrap gap-10">
    @foreach ($listMatakuliah as $matakuliah)
    <div
      class="w-full md:w-[45%] px-4 pt-3 pb-2 bg-white rounded shadow-md relative">
      <span
        class="w-16 h-16 rounded-full absolute right-6 -top-8 bg-white flex justify-center items-center border-8 border-gray-100 text-2xl text-gray-700">
        <i class="fas fa-book"></i>
      </span>
      <h2 class="text-xl font-bold py-1 border-b-2 border-gray-200">
        {{ $matakuliah->nama }}</h2>
      <p class="text-gray-700 lining-nums py-1">
        Kode : <span
          class="text-gray-900 font-bold">{{ $matakuliah->kode }}</span>
      </p>
    </div>
    @endforeach
  </div>

</main>

@endsection