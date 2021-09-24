@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-10">{{ $title }}</h1>

<form action="/admin/struktur/{{ $struktur->id }}" method="post">
  @method("delete")
  @csrf

  <button onclick="return confirm("Anda yakin ingin menghapus data ini ?")" class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
    <i class="fas fa-trash mr-3"></i> Hapus Jabatan
  </button>

</form>

<form method="POST" action="/admin/struktur/{{ $struktur->id }}" class="p-10 bg-white rounded shadow-xl w-2/3 mt-4">
  @method("put")
  @csrf
  
  <div class="mb-4">
    <label class="block text-sm text-gray-700" for="jabatan">Nama Jabatan</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("jabatan") border-red-500 @enderror" id="jabatan" name="jabatan" type="text" placeholder="Nama Jabatan" aria-label="Jabatan" value="{{ old("jabatan", $struktur->jabatan) }}">
      @error("jabatan")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
      <label class="block text-sm text-gray-700" for="dosen_id">Dosen</label>
      <select class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("dosen_id") border-red-500 @enderror" name="dosen_id" id="dosen_id">
        @foreach ($listDosen as $dosen)
          @if (old("dosen_id", $struktur->dosen->id) == $dosen->id)
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
  <div>
      <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Simpan Perubahan</button>
  </div>
</form>

@endsection