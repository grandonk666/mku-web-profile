@extends("layouts.main")

@section("content")

<div class="relative w-full min-h-[70vh] md:min-h-screen flex justify-center items-center bg-cover bg-bottom" style="background-image: url({{ asset("posts-hero.jpg") }})">
  <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent bg-black/20 flex justify-center items-center flex-col">
    <div class="bg-black/80 flex justify-center items-center  w-11/12 lg:w-4/5 py-12">
      <h1 class="text-4xl lg:text-6xl font-bold text-white text-center">Berita & Pengumuman</h1>
    </div>
  </div>
</div>

<main class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-8">
    <span class="block w-40 h-1.5 bg-gray-500 rounded-full mb-2"></span>
    <h2 class="text-gray-800 font-bold text-3xl">Berita & Pengumuman</h2>
  </div>

  <div class="flex justify-center items-stretch flex-wrap gap-10">
    @foreach ($posts as $post)
    <div class="flex flex-col rounded shadow-xl max-w-sm">
      <div class="flex-shrink-0">
        @if ($post->sampul)
        <img class="h-48 w-full object-cover" src="{{ asset("storage/".$post->sampul) }}" alt="{{ $post->judul }}" />
        @else
        <img class="h-48 w-full object-cover" src="{{ asset("storage/sampul-post/sampul-default.jpg") }}" alt="{{ $post->judul }}" />
        @endif
      </div>
      <div class="flex-1 bg-white p-6 flex flex-col justify-between">
        <div class="flex-1">
          <p class="text-sm leading-5 font-medium text-blue-600 uppercase">
            <a href="#" class="hover:underline">
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
          <a class="text-blue-400 hover:text-blue-900 text-sm transition duration-150 ease-in-out group" href="{{ route("posts.show", $post) }}">Lanjut Baca
            <svg class="group-hover:hidden inline-block ml-1 w-2 h-2 stroke-2 stroke-current" viewBox="0 0 10 10" fill="none" aria-hidden="true">
              <g fill-rule="evenodd">
                <path d="M1 1l4 4-4 4"></path>
              </g>
            </svg>
            <svg class="hidden group-hover:inline-block ml-1 w-2 h-2 stroke-2 stroke-current" viewBox="0 0 10 10" fill="none" aria-hidden="true">
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
    @endforeach
  </div>

</main>

@endsection