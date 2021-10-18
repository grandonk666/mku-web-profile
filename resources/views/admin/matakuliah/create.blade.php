@extends("admin.layouts.main")

@section('content')

  <form id="form" method="POST" action="{{ route('admin.matakuliah.store') }}"
    class="p-3 md:p-10 bg-white rounded shadow-md w-full">
    @csrf

    <div class="mb-4">
      <label class="block text-sm text-gray-700" for="nama">Nama</label>
      <input
        class="slug-from w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 focus:border-gray-800 @error('nama') border-red-500 @enderror"
        id="nama" name="nama" type="text" placeholder="Nama Matakuliah"
        aria-label="nama" value="{{ old('nama') }}">
      @error('nama')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-4">
      <label class="block text-sm text-gray-700" for="slug">Slug</label>
      <input
        class="slug-field w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 focus:border-gray-800 @error('slug') border-red-500 @enderror"
        id="slug" name="slug" type="text" placeholder="Slug" aria-label="slug"
        readonly value="{{ old('slug') }}">
      @error('slug')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="detail">Detail</label>
      <div
        class="p-1 border-2 rounded prose prose-sm max-w-none @error('detail') border-red-500 @enderror">
        <input id="detail" type="hidden" name="detail" />
        <trix-editor id="trix" input="detail"></trix-editor>
      </div>
      @error('detail')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="flex gap-3">
      <button
        class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded"
        type="submit">Tambah Data</button>

      <a href="{{ route('admin.matakuliah.index') }}"
        class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
    </div>
  </form>

@endsection

@section('script')

  <script src="{{ asset('js/trix.js') }}"></script>
  <script src="{{ asset('js/generateSlug.js') }}"></script>

  @include("admin.attachment-script")

@endsection
