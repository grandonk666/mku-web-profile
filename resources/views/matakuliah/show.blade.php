@extends("layouts.main")

@section('meta')

  @include("partials.site-meta", [
  "title" => $title,
  "image" => asset("matakuliah-hero.jpg"),
  "keywords" => "mku, matakuliah, upn, jatim" . $matakuliah->nama,
  "description" => "Data Matakuliah yang ada di Matakuliah Umum Universitas
  Pembangunan Nasional Veteran Jawa Timur",
  "article" => true
  ])

@endsection

@section('content')

  @include("partials.hero-section", [
  "text" => $title,
  "image" => asset("matakuliah-hero.jpg")
  ])

  <main
    class="container mx-auto min-h-screen py-12 px-4 flex justify-between items-start gap-6 flex-col md:flex-row">
    <div class="w-full md:w-[70%] min-h-screen bg-white rounded shadow-md p-4">
      <div class="w-full border-b-2 border-gray-800 flex items-center py-1 mb-4">
        <p class="leading-5 font-bold text-blue-600 uppercase px-2">
          <a href="{{ route('matakuliah.index') }}" class="hover:underline">
            Matakuliah
          </a>
        </p>
        <time
          class="text-sm leading-5 text-gray-500 lining-nums px-2 border-l-2 border-gray-800"
          datetime="{{ $matakuliah->created_at->format('Y-m-d') }}">
          {{ $matakuliah->created_at->format('d M Y') }}
        </time>
      </div>
      <div class="p-2">
        <h2 class="text-3xl font-bold mb-4">{{ $title }}</h2>
        <article class="prose max-w-none">
          {!! $matakuliah->detail !!}
        </article>
      </div>
    </div>
    <div class="w-full md:w-[30%] sticky top-20">
      @if ($matakuliah->file_support)
      <div class="bg-white rounded shadow-md overflow-hidden mb-6">
        <span class="block text-center text-2xl font-bold text-white px-6 py-4 bg-gray-500">
          File Lampiran
        </span>
        <div class="w-full px-4 py-6 border-t border-gray-500">
          <a href="{{ asset('storage/'. $matakuliah->file_support->path) }}"
            class="text-lg text-red-100 rounded px-3 py-2 inline-flex justify-center items-center bg-red-600 hover:bg-red-500 transition-all">
            <i class="fas fa-file-alt mr-4 text-3xl"></i> <span>{{ $matakuliah->file_support->filename }}</span>
          </a>
        </div>
      </div>
      @endif
      <div class="bg-white rounded shadow-md overflow-hidden">
        <a href="{{ route('matakuliah.index') }}"
          class="block text-center text-2xl font-bold text-white px-6 py-4 bg-gray-500">
          Matakuliah lain
        </a>
        @foreach ($listMatakuliah as $matakuliah)
          <div class="w-full p-4 border-t border-gray-500">
            <a href="{{ route('matakuliah.show', $matakuliah) }}"
              class="text-lg hover:text-blue-500 hover:underline">
              {{ $matakuliah->nama }}
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </main>

@endsection
