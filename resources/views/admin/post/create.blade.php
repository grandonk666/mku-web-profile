@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-10">{{ $title }}</h1>

<form method="POST" action="/admin/dosen" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl w-5/6">
  @csrf
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="judul">Judul</label>
      <input class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("judul") border-red-500 @enderror" id="judul" name="judul" type="text" placeholder="Judul" aria-label="judul" value="{{ old("judul") }}">
      @error("judul")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
      <label class="block text-sm text-gray-700" for="slug">Slug</label>
      <input class="w-full px-5 py-1 text-gray-400 bg-gray-100 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("slug") border-red-500 @enderror" id="slug" name="slug" type="text" placeholder="Slug" aria-label="Slug" value="{{ old("slug") }}" disabled readonly>
      @error("slug")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div class="mb-4">
    <label class="block text-sm text-gray-700" for="kategori_id">Kategori</label>
    <select class="w-full px-5 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("kategori_id") border-red-500 @enderror" name="kategori_id" id="kategori_id">
      @foreach ($listKategori as $kategori)
        @if (old("kategori_id") == $kategori->id)
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
      <div class="w-60">
        <div class="aspect-h-4 aspect-w-6 hidden img-container">
          <img class="img-preview border border-gray-700 mb-2 object-center object-cover">
        </div>
      </div>
        
      <input onchange="previewImg()" class="img-input w-full px-0 py-1 text-gray-800 bg-gray-200 rounded outline-none border-2 border-gray-200 focus:border-gray-800 @error("sampul") border-red-500 @enderror" id="sampul" name="sampul" type="file">
      @error("sampul")
        <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
      @enderror
  </div>
  <div>
      <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded" type="submit">Tambah Data</button>
  </div>
</form>

@endsection

@section("script")
<script>
  const previewImg = () => {
    const image = document.querySelector(".img-input")
    const imgPreview = document.querySelector(".img-preview")
    const imgContainer = document.querySelector(".img-container")
        
    imgContainer.style.display = 'block'
    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result
    }
  }

  const judul = document.querySelector("#judul")
  const slug = document.querySelector("#slug")

  const generateSlug = () => {
    fetch(`/admin/post/createSlug?judul=${judul.value}`)
      .then(res => res.json())
      .then(data => slug.value = data.slug)
      .catch(err => console.log(err))
  }

  judul.addEventListener("change", () => {
    generateSlug()
  })
</script>
@endsection