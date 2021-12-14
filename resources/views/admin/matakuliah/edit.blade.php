@extends("admin.layouts.main")

@section('content')

  <form id="form" method="POST"
    action="{{ route('admin.matakuliah.update', $matakuliah) }}"
    class="p-3 md:p-10 bg-white rounded shadow-md w-full mb-4"
    enctype="multipart/form-data">
    @method("put")
    @csrf

    <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nama">Nama</label>
      <input
        class="slug-from w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800
        @error('nama') border-red-500 @enderror"
        id="nama" name="nama" type="text" placeholder="Nama Matakuliah"
        aria-label="nama" value="{{ old('nama', $matakuliah->nama) }}">
      @error('nama')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>

    <div class="mb-4">
      <label class="block text-sm text-gray-700" for="slug">Slug</label>
      <input
        class="slug-field w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800 @error('slug') border-red-500 @enderror"
        id="slug" name="slug" type="text" placeholder="Slug" aria-label="slug"
        readonly value="{{ old('slug', $matakuliah->slug) }}">
      @error('slug')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block text-sm text-gray-700" for="detail">Detail</label>
      <div
        class="p-1 border-2 rounded prose prose-sm max-w-none @error('detail') border-red-500 @enderror">
        <input id="detail" type="hidden" name="detail"
          value="{{ $matakuliah->detail }}" />
        <trix-editor id="trix" input="detail"></trix-editor>
      </div>
      @error('detail')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>

    <span class="block text-gray-700">File Lampiran (Boleh
      Kosong)</span>
    <div class="mb-6 flex w-full gap-3 justify-between items-stretch pl-2">
      <div class="w-2/3">
        <label class="block text-sm text-gray-700" for="file_name">Nama</label>
        <input
          class="slug-from w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800 @error('file_name') border-red-500 @enderror"
          id="file_name" name="file_name" type="text" placeholder="Nama File"
          maxlength="50" aria-label="file_name"
          value="{{ old('file_name', $matakuliah->file_support->filename ?? '') }}">
        @error('file_name')
          <span class="text-xs font-bold text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <div class="w-1/3">
        <label class="block text-sm text-gray-700" for="file_support">File</label>
        @if ($matakuliah->file_support)
          <a class="pdf-preview block px-3 py-1 bg-green-500 text-white rounded text-xs mb-1"
            href="{{ asset('storage/' . $matakuliah->file_support->path) }}">
            {{ $matakuliah->file_support->path }}
          </a>
        @endif
        <input
          class="pdf-input w-full px-0 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800 @error('file_support') border-red-500 @enderror"
          id="file_support" name="file_support" type="file">
        @error('file_support')
          <span class="text-xs font-bold text-red-500">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <div class="flex gap-3">
      <button
        class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded"
        type="submit">Simpan Perubahan</button>

      <a href="{{ route('admin.matakuliah.index') }}"
        class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
    </div>
  </form>

  <form action="{{ route('admin.matakuliah.destroy', $matakuliah) }}"
    method="post">
    @method("delete")
    @csrf

    <button onclick="return confirm('Anda Yakin Ingin Menghapus ?')"
      class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
      <i class="fas fa-trash mr-3"></i> Hapus Matakuliah
    </button>

  </form>

@endsection

@section('script')

  <script src="{{ asset('js/trix.js') }}"></script>
  <script src="{{ asset('js/generateSlug.js') }}"></script>

  @include("admin.attachment-script", [
  "model_id" => $matakuliah->id,
  "model_type" => "matakuliah"
  ])

  <script>
    const pdfPreview = document.querySelector('.pdf-preview')
    if (pdfPreview) {
      const fileName = pdfPreview.innerText.split('/')[1]
      const extension = fileName.split('.')[1];
      const originalName = fileName.split('date')[0];
      pdfPreview.innerText = `${originalName}.${extension}`
    }
  </script>

@endsection
