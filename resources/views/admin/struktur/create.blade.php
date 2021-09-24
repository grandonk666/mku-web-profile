@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-6">{{ $title }}</h1>

<form method="POST" action="/admin/struktur" class="p-10 bg-white rounded shadow-xl w-2/3">
  @csrf
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="jabatan">Nama Jabatan</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("jabatan") border-red-500 @enderror" id="jabatan" name="jabatan" type="text" placeholder="Nama Jabatan" aria-label="Jabatan" value="{{ old("jabatan") }}">
      @error("jabatan")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
      <label class="block text-sm text-gray-700" for="dosen_id">Dosen</label>
      <select class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("dosen_id") border-red-500 @enderror" name="dosen_id" id="dosen_id">
        @foreach ($listDosen as $dosen)
          @if (old("dosen_id") == $dosen->id)
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
      <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Tambah Data</button>
  </div>
</form>

@endsection