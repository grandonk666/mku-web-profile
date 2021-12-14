@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => asset("posts-hero.jpg"),
  "keywords" => "mku, struktur organisasi, organisasi, upn, jatim",
  "description" => "Gallery Foto Matakuliah Umum Universitas Pembangunan
  Nasional Veteran Jawa Timur"
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => "Gallery Foto",
  "image" => asset("posts-hero.jpg")
  ])

  <main class="container mx-auto min-h-screen py-12 px-4 md:px-10 relative">
    <div class="mb-10">
      @include("partials.section-title", ["text" => "Gallery Foto MKU"])
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-3 auto-rows-[240px] gap-4">
      @foreach ($galleries as $gallery)
        <div
          onclick="openModal(true, '{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->caption }}');"
          class="cursor-pointer group block w-full h-full transition-all duration-500 transform hover:scale-95 bg-cover bg-top @if ($loop->index % 3 == 0) lg:row-span-2 @endif"
          style="background-image: url({{ asset('storage/' . $gallery->image) }})">
          <div
            class="w-full h-full flex justify-center items-center bg-black/70 opacity-0 group-hover:opacity-100 transition-all duration-500 px-4">
            <p class="text-white text-lg text-center">
              {{ $gallery->caption }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
    <div id="modal_overlay"
      class="hidden fixed inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-20">

      <!-- modal -->
      <div id="modal"
        class="opacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-[70%] h-1/2 md:h-[90%] bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

        <!-- button close -->
        <button onclick="openModal(false)"
          class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
          &cross;
        </button>

        <!-- header -->
        <div class="px-4 py-3 border-b border-gray-200">
          <img id="modal-image" src="" alt=""
            class="w-full h-[22rem] object-cover object-center">
        </div>

        <!-- body -->
        <div id="modal-caption" class="w-full p-3">

        </div>
      </div>

    </div>
  </main>

@endsection

@section('script')

  <script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');
    const modalImage = document.querySelector('#modal-image');
    const modalCaption = document.querySelector('#modal-caption');

    function openModal(value, image = "", caption = "") {
      const modalCl = modal.classList;
      const overlayCl = modal_overlay

      if (value) {
        modalImage.src = image;
        modalCaption.innerText = caption

        overlayCl.classList.remove('hidden')
        setTimeout(() => {
          modalCl.remove('opacity-0')
          modalCl.remove('-translate-y-full')
          modalCl.remove('scale-150')
        }, 100);
      } else {
        modalCl.add('-translate-y-full')
        setTimeout(() => {
          modalCl.add('opacity-0')
          modalCl.add('scale-150')
        }, 100);
        setTimeout(() => overlayCl.classList.add('hidden'), 300);
      }
    }
  </script>

@endsection
