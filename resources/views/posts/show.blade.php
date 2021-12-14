@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => $post->sampul ? asset("storage/".$post->sampul) :
  asset("storage/sampul-post/sampul-default.jpg"),
  "keywords" => "mku, upn, jatim, " . $post->kategori->nama,
  "description" => $post->excerpt,
  "article" => true
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => $title,
  "image" => $post->sampul ? asset("storage/".$post->sampul) :
  asset("storage/sampul-post/sampul-default.jpg")
  ])

  <main
    class="container mx-auto min-h-screen py-12 px-4 flex justify-between items-start gap-6 flex-col md:flex-row">
    <div class="w-full md:w-[70%] min-h-screen bg-white rounded shadow-md p-4">
      <div class="w-full border-b-2 border-gray-800 flex items-center py-1 mb-4">
        <p class="leading-5 font-bold text-blue-600 uppercase px-2">
          <a href="{{ route('post.index', ['kategori' => $post->kategori->slug]) }}"
            class="hover:underline">
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
    <div class="w-full md:w-[30%] sticky top-20">
      @if ($post->file_support)
      <div class="bg-white rounded shadow-md overflow-hidden mb-6">
        <span class="block text-center text-2xl font-bold text-white px-6 py-4 bg-gray-500">
          File Lampiran
        </span>
        <div class="w-full px-4 py-6 border-t border-gray-500">
          <a href="{{ asset('storage/'. $post->file_support->path) }}"
            class="text-lg text-red-100 rounded px-3 py-2 inline-flex justify-center items-center bg-red-600 hover:bg-red-500 transition-all">
            <i class="fas fa-file-alt mr-4 text-3xl"></i> <span>{{ $post->file_support->filename }}</span>
          </a>
        </div>
      </div>
      @endif
      <div class="bg-white rounded shadow-md overflow-hidden">
        <h3 class="text-center text-2xl font-bold text-white px-6 py-4 bg-gray-500">
        Berita lain</h3>
      @foreach ($latestPosts as $post)
        <div class="w-full p-4 border-t border-gray-500">
          <a href="{{ route('post.show', $post) }}"
            class="text-lg hover:text-blue-500 hover:underline">{{ $post->judul }}</a>
          <div class="w-full flex justify-between items-center py-1 mt-2">
            <p class="leading-5 text-sm font-bold text-blue-600 uppercase">
              <a href="{{ route('post.index', ['kategori' => $post->kategori->slug]) }}"
                class="hover:underline">
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
    </div>
    {{-- <div
      class="w-full md:w-[30%] bg-white rounded shadow-md overflow-hidden sticky top-20">
      <h3 class="text-center text-2xl font-bold text-white px-6 py-4 bg-gray-500">
        Berita lain</h3>
      @foreach ($latestPosts as $post)
        <div class="w-full p-4 border-t border-gray-500">
          <a href="{{ route('post.show', $post) }}"
            class="text-lg hover:text-blue-500 hover:underline">{{ $post->judul }}</a>
          <div class="w-full flex justify-between items-center py-1 mt-2">
            <p class="leading-5 text-sm font-bold text-blue-600 uppercase">
              <a href="{{ route('post.index', ['kategori' => $post->kategori->slug]) }}"
                class="hover:underline">
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
    </div> --}}
  </main>

@endsection
