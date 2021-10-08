@extends("layouts.main")

@section("content")

<div
  class="relative w-full min-h-[70vh] md:min-h-screen flex justify-center items-center bg-cover bg-bottom"
  @if ($post->sampul)
  style="background-image: url({{ asset("storage/".$post->sampul) }})">
  @else
  style="background-image:
  url({{ asset("storage/sampul-post/sampul-default.jpg") }})">
  @endif
  <div
    class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent bg-black/20 flex justify-center items-center flex-col">
    <div
      class="bg-black/80 flex justify-center items-center w-11/12 lg:w-4/5 py-12">
      <h1
        class="text-4xl lg:text-6xl font-bold text-white text-center leading-loose">
        {{ $title }}</h1>
    </div>
  </div>
</div>

<main
  class="container mx-auto min-h-screen py-12 px-4 flex justify-between items-start gap-6 flex-col md:flex-row">
  <div class="w-full md:w-[70%] min-h-screen bg-white rounded shadow-md p-4">
    <div class="w-full border-b-2 border-gray-800 flex items-center py-1 mb-4">
      <p class="leading-5 font-bold text-blue-600 uppercase px-2">
        <a href="#" class="hover:underline">
          {{ $post->kategori->nama }}
        </a>
      </p>
      <time
        class="text-sm leading-5 text-gray-500 lining-nums px-2 border-l-2 border-gray-800"
        datetime="{{ $post->created_at->format('Y-m-d') }}">
        {{ $post->created_at->format('d M Y') }}
      </time>
    </div>
    <div class="p-2">
      <h2 class="text-3xl font-bold mb-4">{{ $title }}</h2>
      <article class="prose max-w-none">
        {!! $post->body !!}
      </article>
    </div>
  </div>
  <div
    class="w-full md:w-[30%] bg-white rounded shadow-md overflow-hidden sticky top-20">
    <h3 class="text-center text-2xl font-bold text-white px-6 py-4 bg-gray-500">
      Berita lain</h3>
    @foreach ($latestPosts as $post)
    <div class="w-full p-4 border-t border-gray-500">
      <a href="#"
        class="text-lg hover:text-blue-500 hover:underline">{{ $post->judul }}</a>
      <div class="w-full flex justify-between items-center py-1 mt-2">
        <p class="leading-5 text-sm font-bold text-blue-600 uppercase">
          <a href="#" class="hover:underline">
            {{ $post->kategori->nama }}
          </a>
        </p>
        <time class="text-sm leading-5 text-gray-500 lining-nums"
          datetime="{{ $post->created_at->format('Y-m-d') }}">
          {{ $post->created_at->format('d M Y') }}
        </time>
      </div>
    </div>
    @endforeach
  </div>
</main>

@endsection