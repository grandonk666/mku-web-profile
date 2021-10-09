@extends("layouts.main")

@section("content")

<div
  class="relative w-full min-h-[70vh] md:min-h-screen flex justify-center items-center bg-cover bg-bottom"
  style="background-image: url({{ asset("dosen-hero.jpg") }})">
  <div
    class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent bg-black/20 flex justify-center items-center flex-col">
    <div
      class="bg-black/80 flex justify-center items-center  w-11/12 lg:w-4/5 py-12">
      <h1 class="text-4xl lg:text-6xl font-bold text-white text-center">Data
        Dosen</h1>
    </div>
  </div>
</div>

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-8">
    <span class="block w-40 h-1.5 bg-gray-500 rounded-full mb-2"></span>
    <h2 class="text-gray-900 font-bold text-3xl">Daftar Dosen MKU</h2>
  </div>

  <div class="flex justify-center items-stretch flex-wrap gap-10">
    @foreach ($listDosen as $dosen)
    <div class="w-11/12 md:w-[28%] p-3 bg-white rounded shadow-md">
      <div class="aspect-h-10 aspect-w-9 rounded overflow-hidden mb-4">
        @if ($dosen->foto)
        <img src="{{ asset("storage/".$dosen->foto) }}" alt="{{ $dosen->nama }}"
          class="img-preview mb-2 object-center object-cover">
        @else
        <img src="{{ asset("storage/foto-dosen/foto-default.jpg") }}"
          alt="{{ $dosen->nama }}"
          class="img-preview mb-2 object-center object-cover">
        @endif
      </div>
      <div class="px-2">
        <p class="text-xl font-bold">{{ $dosen->nama }}</p>
      </div>
    </div>
    @endforeach
  </div>

</main>

@endsection