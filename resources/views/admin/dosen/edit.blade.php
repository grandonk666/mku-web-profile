@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-6">{{ $title }}</h1>

<form action="/admin/dosen/{{ $dosen->id }}" method="post">
  @method("delete")
  @csrf

  <button onclick="return confirm("Anda yakin ingin menghapus data ini ?")" class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
    <i class="fas fa-trash mr-3"></i> Hapus Data Dosen
  </button>

</form>

<form method="POST" action="/admin/dosen/{{ $dosen->id }}" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl w-2/3 mt-4">
  @method("put")
  @csrf
  
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nama">Nama</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("nama") border-red-500 @enderror" id="nama" name="nama" type="text" placeholder="Nama Dosen" aria-label="nama" value="{{ old("nama", $dosen->nama) }}">
      @error("nama")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nip">NIP</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("nip") border-red-500 @enderror" id="nip" name="nip" type="text" placeholder="NIP Dosen" aria-label="NIP" value="{{ old("nip", $dosen->nip) }}">
      @error("nip")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
    <label class="block text-sm text-gray-700" for="foto">Foto</label>
    <input type="hidden" name="oldFoto" value="{{ $dosen->foto }}">
    @if ($dosen->foto)
      <img src="{{ asset("storage/". $dosen->foto) }}" class="img-preview w-32 h-36 mb-2 object-center object-cover">
    @else
      <img class="img-preview w-32 h-36 mb-2 hidden object-center object-cover">
    @endif
    <input onchange="previewImg()" class="w-full px-0 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("foto") border-red-500 @enderror" id="foto" name="foto" type="file">
    @error("foto")
      <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
    @enderror
  </div>
  <div>
      <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Simpan Perubahan</button>
  </div>
</form>

@endsection