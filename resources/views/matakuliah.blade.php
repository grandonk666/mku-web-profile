@extends("layouts.main")

@section("content")

<div class="relative w-full min-h-[70vh] md:min-h-screen flex justify-center items-center bg-cover bg-bottom" style="background-image: url({{ asset("matakuliah-hero.jpg") }})">
  <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent bg-black/20 flex justify-center items-center flex-col">
    <div class="bg-black/80 flex justify-center items-center  w-11/12 lg:w-4/5 py-12">
      <h1 class="text-4xl lg:text-6xl font-bold text-white text-center">Data Matakuliah</h1>
    </div>
  </div>
</div>

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-8">
    <span class="block w-40 h-1.5 bg-gray-500 rounded-full mb-2"></span>
    <h2 class="text-gray-800 font-bold text-3xl">Daftar Matakuliah MKU</h2>
  </div>

  <div class="flex justify-between px-4 items-center flex-wrap gap-10">
    @foreach ($listMatakuliah as $matakuliah)
    <div class="w-[45%] p-3 bg-gray-200 rounded shadow-md relative">
      <span class="w-16 h-16 rounded-full absolute right-6 -top-6 bg-gray-200 flex justify-center items-center border-8 border-white text-2xl"><i class="fas fa-book"></i></span>
      <h2 class="text-xl font-bold pt-1 pb-2 border-b-2 border-gray-400">{{ $matakuliah->nama }}</h2>
      <p class="text-gray-700 lining-nums py-1">Kode : <span class="text-gray-900 font-bold">{{ $matakuliah->kode }}</span></p>
    </div>
    @endforeach
  </div>

</main>

@endsection