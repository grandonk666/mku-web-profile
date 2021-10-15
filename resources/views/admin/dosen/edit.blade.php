@extends("admin.layouts.main")

@section('content')

  <form method="POST" action="{{ route('admin.dosen.update', $dosen) }}"
    enctype="multipart/form-data"
    class="p-3 md:p-10 bg-white rounded shadow-md w-full mb-4">
    @method("put")
    @csrf

    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="nama">Nama</label>
      <input
        class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 focus:border-gray-800
      @error('nama') border-red-500 @enderror"
        id="nama" name="nama" type="text" placeholder="Nama Dosen"
        aria-label="nama" value="{{ old('nama', $dosen->nama) }}">
      @error('nama')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="matakuliah_id">
        Matakuliah <span class="text-xs text-gray-500">(Boleh Kosong)</span>
      </label>
      <select
        class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 
      focus:border-gray-800 @error('matakuliah_id') border-red-500 @enderror"
        name="matakuliah_id" id="matakuliah_id">
        <option value=""> -- Pilih Matakuliah -- </option>
        @foreach ($listMatakuliah as $matakuliah)
          @if ($dosen->matakuliah && old('matakuliah_id', $dosen->matakuliah->id) == $matakuliah->id)
            <option value="{{ $matakuliah->id }}" selected>
              {{ $matakuliah->nama }}
            </option>
          @else
            <option value="{{ $matakuliah->id }}">{{ $matakuliah->nama }}
            </option>
          @endif
        @endforeach
      </select>
      @error('matakuliah_id')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="matakuliah_id">
        NIP <span class="text-xs text-gray-500">(Boleh Kosong)</span>
      </label>
      <input
        class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 focus:border-gray-800
      @error('nip') border-red-500 @enderror"
        id="nip" name="nip" type="text" placeholder="NIP Dosen" aria-label="NIP"
        value="{{ old('nip', $dosen->nip) }}">
      @error('nip')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="foto">Foto</label>
      <input type="hidden" name="oldFoto" value="{{ $dosen->foto }}">

      @if ($dosen->foto)
        <div class="w-24 mb-1">
          <div class="aspect-h-4 aspect-w-3 img-container">
            <img src="{{ asset('storage/' . $dosen->foto) }}"
              class="img-preview mb-2 object-center object-cover">
          </div>
        </div>
      @else
        <div class="w-24 mb-1">
          <div class="aspect-h-4 aspect-w-3 hidden img-container">
            <img
              class="img-preview border border-gray-700 mb-2 object-center object-cover">
          </div>
        </div>
      @endif

      <input onchange="previewImg()"
        class="img-input w-full px-0 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("
      foto") border-red-500 @enderror" id="foto" name="foto" type="file">
    @error('foto')
      <span class="text-xs font-bold text-red-500">{{ $message }}</span>
    @enderror
  </div>
  <div class="flex gap-3">
    <button
      class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded"
      type="submit">Simpan Perubahan</button>

    <a href="{{ route('admin.dosen.index') }}"
      class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
  </div>
</form>

<form action="{{ route('admin.dosen.destroy', $dosen) }}" method="post">
  @method("delete")
  @csrf

  <button onclick="return confirm('Anda Yakin Ingin Menghapus ?')"
    class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
    <i class="fas fa-trash mr-3"></i> Hapus Data Dosen
  </button>

</form>

@endsection

@section('script')

<script src="{{ asset('js/imagePreview.js') }}"></script>

@endsection
