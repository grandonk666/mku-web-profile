@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-10">{{ $title }}</h1>

<form action="/admin/post/{{ $post->id }}" method="post">
  @method("delete")
  @csrf

  <button onclick="return confirm("Anda yakin ingin menghapus data ini ?")" class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
    <i class="fas fa-trash mr-3"></i> Hapus Post
  </button>

</form>

<form method="POST" action="/admin/post/{{ $post->id }}" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl w-5/6 mt-4">
  @method("put")
  @csrf
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="judul">Judul</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("judul") border-red-500 @enderror" id="judul" name="judul" type="text" placeholder="Judul" aria-label="judul" value="{{ old("judul", $post->judul), }}">
      @error("judul")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="slug">Slug</label>
      <input class="w-full px-5 py-1 text-gray-400 bg-gray-100 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("slug") border-red-500 @enderror" id="slug" name="slug" type="text" placeholder="Slug" aria-label="Slug" value="{{ old("slug", $post->slug) }}" readonly>
      @error("slug")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
    <label class="block text-sm text-gray-700" for="kategori_id">Kategori</label>
    <select class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("kategori_id") border-red-500 @enderror" name="kategori_id" id="kategori_id">
      @foreach ($listKategori as $kategori)
        @if (old("kategori_id", $post->kategori->id) == $kategori->id)
          <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
        @else
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
        @endif
      @endforeach
    </select>
    @error("kategori_id")
      <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="sampul">Sampul</label>
      <input type="hidden" name="oldSampul" value="{{ $post->sampul }}">

      @if ($post->sampul)
      <div class="w-60 mb-1">
        <div class="aspect-h-4 aspect-w-6 img-container">
          <img src="{{ asset("storage/". $post->sampul) }}" class="img-preview border border-gray-700 mb-2 object-center object-cover">
        </div>
      </div>  
      @else
      <div class="w-60 mb-1">
        <div class="aspect-h-4 aspect-w-6 hidden img-container">
          <img class="img-preview border border-gray-700 mb-2 object-center object-cover">
        </div>
      </div>
      @endif
        
      <input onchange="previewImg()" class="img-input w-full px-0 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("sampul") border-red-500 @enderror" id="sampul" name="sampul" type="file">
      @error("sampul")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-6">
    <label class="block text-sm text-gray-700" for="body">Body</label>
    <input id="body" type="hidden" name="body" value="{{ old("body", $post->body) }}" />
    <trix-editor input="body"></trix-editor>
    @error("body")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
    @enderror
  </div>
  <div>
      <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Simpan Perubahan</button>
  </div>
</form>

{{-- <div>
  {{ $post->trixRichText->first()->content }}
</div> --}}

@endsection

@section("script")

<script src="{{ asset("js/trix.js") }}"></script>
<script src="{{ asset("js/imagePreview.js") }}"></script>
<script src="{{ asset("js/generateSlug.js") }}"></script>

<script>

  addEventListener("trix-file-accept", function(event) {
      event.preventDefault()
  })
  
</script>

@endsection

{{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem ducimus cumque asperiores dolor? Libero a non animi ratione ipsam, ex fugit quaerat impedit blanditiis reiciendis culpa illum harum ullam quisquam.
Laudantium accusantium architecto explicabo ipsa officia magni sed, quas obcaecati, eligendi dolorum ab quasi iure quam! Enim alias adipisci nobis eum eius dolorum quas ipsam, fuga tenetur? Eaque, ullam architecto?
Illum, officiis quaerat fuga ex quam consectetur quibusdam repudiandae eaque modi pariatur, mollitia et placeat odio! Officiis rerum et voluptate? Iste adipisci voluptates nobis temporibus fugit cum quo maxime fuga. --}}