@extends("admin.layouts.main")

@section("content")

<form method="POST" action="{{ route("admin.matakuliah.update", $matakuliah) }}" class="p-10 bg-white rounded shadow-md w-full mb-4">
  @method("put")
  @csrf
  
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nama">Nama</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("nama") border-red-500 @enderror" id="nama" name="nama" type="text" placeholder="Nama Matakuliah" aria-label="nama" value="{{ old("nama", $matakuliah->nama) }}">
      @error("nama")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="kode">Kode</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("kode") border-red-500 @enderror" id="kode" name="kode" type="text" placeholder="Kode Matakuliah" aria-label="Kode" value="{{ old("kode", $matakuliah->kode) }}">
      @error("kode")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
      <label class="block text-sm text-gray-700" for="dosen_id">Dosen</label>
      <select class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("dosen_id") border-red-500 @enderror" name="dosen_id" id="dosen_id">
        <option value=""> -- Pilih Dosen -- </option>
        @foreach ($listDosen as $dosen)
          @if (old("dosen_id", $matakuliah->dosen->id) == $dosen->id)
            <option value="{{ $dosen->id }}" selected>{{ $dosen->nama }}</option>
          @else
            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
          @endif
        @endforeach
      </select>
      @error("dosen_id")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="flex gap-3">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Simpan Perubahan</button>

    <a href="{{ route("admin.matakuliah.index") }}" class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
</div>
</form>

<form action="{{ route("admin.matakuliah.destroy", $matakuliah) }}" method="post">
  @method("delete")
  @csrf

  <button onclick="return confirm('Anda Yakin Ingin Menghapus ?')" class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
    <i class="fas fa-trash mr-3"></i> Hapus Matakuliah
  </button>

</form>

@endsection