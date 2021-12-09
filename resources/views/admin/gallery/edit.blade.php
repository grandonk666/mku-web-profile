@extends("admin.layouts.main")

@section('content')

  <form method="POST" action="{{ route('admin.gallery.update', $gallery) }}"
    enctype="multipart/form-data"
    class="p-3 md:p-10 bg-white rounded shadow-md w-full mb-3">
    @method('PUT')
    @csrf

    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="image">Gambar</label>
      <input type="hidden" name="oldImage" value="{{ $gallery->image }}">

      <div class="w-72 mb-1">
        <div class="aspect-h-3 aspect-w-4 img-container">
          <img src="{{ asset('storage/' . $gallery->image) }}"
            class="img-preview mb-2 object-center object-cover">
        </div>
      </div>

      <input onchange="previewImg()"
        class="img-input w-full px-0 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("
      image") border-red-500 @enderror" id="image" name="image" type="file">
    @error('image')
      <span class="text-xs font-bold text-red-500">{{ $message }}</span>
    @enderror
  </div>

  <div class="mb-6">
    <label class="block text-sm text-gray-700" for="caption">Keterangan
      (Caption)</label>
    <input
      class="w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800
        @error('caption') border-red-500 @enderror"
      id="caption" name="caption" type="text" placeholder="Keterangan (Caption)"
      aria-label="caption" value="{{ old('caption', $gallery->caption) }}">
    @error('caption')
      <span class="text-xs font-bold text-red-500">{{ $message }}</span>
    @enderror
  </div>

  <div class="flex gap-3">
    <button
      class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded outline-none"
      type="submit">Simpan Perubahan</button>

    <a href="{{ route('admin.gallery.index') }}"
      class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
  </div>
</form>

<form action="{{ route('admin.gallery.destroy', $gallery) }}" method="post">
  @method("delete")
  @csrf

  <button onclick="return confirm('Anda Yakin Ingin Menghapus ?')"
    class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
    <i class="fas fa-trash mr-3"></i> Hapus Foto Gallery
  </button>

</form>

@endsection

@section('script')

<script src="{{ asset('js/imagePreview.js') }}"></script>

@endsection
