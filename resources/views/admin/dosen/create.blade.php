@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-10">{{ $title }}</h1>

<form method="POST" action="/admin/dosen" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl w-2/3">
  @csrf
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nama">Nama</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("nama") border-red-500 @enderror" id="nama" name="nama" type="text" placeholder="Nama Dosen" aria-label="nama" value="{{ old("nama") }}">
      @error("nama")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nip">NIP</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("nip") border-red-500 @enderror" id="nip" name="nip" type="text" placeholder="NIP Dosen" aria-label="NIP" value="{{ old("nip") }}">
      @error("nip")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
      <label class="block text-sm text-gray-700" for="foto">Foto</label>
      <div class="w-24 mb-1">
        <div class="aspect-h-4 aspect-w-3 hidden img-container">
          <img class="img-preview border border-gray-700 mb-2 object-center object-cover">
        </div>
      </div>

      <input onchange="previewImg()" class="img-input w-full px-0 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("foto") border-red-500 @enderror" id="foto" name="foto" type="file">
      @error("foto")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div>
      <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Tambah Data</button>
  </div>
</form>

@endsection

@section("script")

<script src="{{ asset("js/imagePreview.js") }}"></script>

@endsection