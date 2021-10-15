@extends("layouts.main")

@section("meta")

@include("partials.site-meta", [
  "title" => $title,
  "image" => asset("posts-hero.jpg"),
  "keywords" => "mku, berita, pengumuman, upn, jatim",
  "description" => "Berita dan Pengumuman Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur"
])

@endsection

@section("content")

@include("partials.hero-section", [
  "text" => "Berita & Pengumuman",
  "image" => asset("posts-hero.jpg")
])

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="w-full flex justify-between flex-wrap items-center mb-8">
    <div class="mb-4">
      @include("partials.section-title", ["text" => "Berita & Pengumunan"])
    </div>

    <div
      class="w-full md:w-1/2 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
      <form action="{{ route("posts.index") }}"
        class="w-full md:w-2/3 flex items-center bg-white rounded-md border border-gray-500">
        @if (request("kategori"))
        <input type="hidden" name="kategori" value="{{ request("kategori") }}">
        @endif
        <div class="w-full">
          <input type="text" name="search" value="{{ request("search") }}"
            class="w-full px-4 py-2 text-gray-900 rounded-md focus:outline-none"
            placeholder="Cari">
        </div>
        <div>
          <button type="submit"
            class="flex items-center justify-center w-10 h-10 text-gray-100 rounded-md bg-gray-500">
            <svg class="w-5 h-5" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
              </path>
            </svg>
          </button>
        </div>
      </form>

      <button onclick="togleDropdown()"
        class="relative px-4 py-1 bg-white rounded-md border border-gray-500">
        <span class="text-lg">Kategori</span>
        <i class="fas fa-angle-down ml-2"></i>
        <div
          class="dropdown-menu hidden left-0 top-10 absolute w-40 bg-white rounded-md shadow-md py-1 border border-gray-500">
          <a href="{{ route("posts.index", ["kategori" => "berita"]) }}"
            class="block py-2 px-2 hover:bg-gray-700 hover:text-white {{ request('kategori') == 'berita' ? 'bg-gray-700 text-white' : '' }}">
            Berita
          </a>
          <a href="{{ route("posts.index", ["kategori" => "pengumuman"]) }}"
            class="block py-2 px-2 hover:bg-gray-700 hover:text-white {{ request('kategori') == 'pengumuman' ? 'bg-gray-700 text-white' : '' }}">
            Pengumuman
          </a>
          <a href="{{ route("posts.index") }}"
            class="block py-2 px-2 hover:bg-gray-700 hover:text-white">
            Tampilkan Semua
          </a>
        </div>
      </button>
    </div>
  </div>

  <div class="flex justify-center items-stretch flex-wrap gap-10 mb-4">
    @forelse ($posts as $post)
    <div class="flex flex-col rounded shadow-md max-w-sm">
      <div class="flex-shrink-0">
        @if ($post->sampul)
        <img class="h-48 w-full object-cover"
          src="{{ asset("storage/".$post->sampul) }}"
          alt="{{ $post->judul }}" />
        @else
        <img class="h-48 w-full object-cover"
          src="{{ asset("storage/sampul-post/sampul-default.jpg") }}"
          alt="{{ $post->judul }}" />
        @endif
      </div>
      <div class="flex-1 bg-white p-6 flex flex-col justify-between">
        <div class="flex-1">
          <p class="text-sm leading-5 font-medium text-blue-600 uppercase">
            <a href="{{ route("posts.index", ["kategori" => $post->kategori->slug]) }}"
              class="hover:underline">
              {{ $post->kategori->nama }}
            </a>
          </p>
          <a href="{{ route("posts.show", $post) }}" class="block">
            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
              {{ $post->judul }}
            </h3>
            <p class="mt-3 text-base leading-6 text-gray-500">
              {{ $post->excerpt }}
            </p>
          </a>
        </div>
        <div class="mt-2">
          <a class="text-blue-400 hover:text-blue-900 text-sm transition duration-150 ease-in-out group"
            href="{{ route("posts.show", $post) }}">Lanjut Baca
            <svg
              class="group-hover:hidden inline-block ml-1 w-2 h-2 stroke-2 stroke-current"
              viewBox="0 0 10 10" fill="none" aria-hidden="true">
              <g fill-rule="evenodd">
                <path d="M1 1l4 4-4 4"></path>
              </g>
            </svg>
            <svg
              class="hidden group-hover:inline-block ml-1 w-2 h-2 stroke-2 stroke-current"
              viewBox="0 0 10 10" fill="none" aria-hidden="true">
              <g fill-rule="evenodd">
                <path d="M0 5h7"></path>
                <path d="M4 1l4 4-4 4"></path>
              </g>
            </svg>
          </a>
        </div>
        <div class="mt-6 flex items-center">
          <div class="flex text-sm leading-5 text-gray-500 lining-nums">
            <time datetime="{{ $post->created_at->format('Y-m-d') }}">
              {{ $post->created_at->format('d M Y') }}
            </time>
          </div>
        </div>
      </div>
    </div>
    @empty
    <h2 class="text-4xl font-bold text-center">Tidak Ditemukan</h2>
    @endforelse
  </div>
  {{ $posts->links() }}

</main>

@endsection