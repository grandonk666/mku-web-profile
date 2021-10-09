@extends("admin.layouts.main")

@section("content")

<a href="{{ route("admin.post.create") }}"
  class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
  <i class="fas fa-plus mr-3"></i> Tambah Post
</a>

@if (session()->has("success"))
<div class="w-full bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
  {{ session("success") }}
</div>
@endif

<div
  class="w-full md:w-1/2 flex flex-col md:flex-row items-start md:items-center justify-between mt-6 gap-4">
  <form action="{{ route("admin.post.index") }}"
    class="w-full flex items-center bg-white rounded-md border border-gray-500">
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
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </button>
    </div>
  </form>

  <button onclick="togleDropdown()"
    class="relative px-4 py-1 bg-white rounded-md border border-gray-500">
    <span class="text-lg">Kategori</span>
    <i class="fas fa-angle-down ml-2"></i>
    <div
      class="dropdown-menu hidden left-0 top-10 absolute w-40 bg-white rounded-lg shadow-lg py-1 border border-gray-500">
      <a href="{{ route("admin.post.index", ["kategori" => "berita"]) }}"
        class="block py-2 hover:bg-gray-700 hover:text-white {{ request('kategori') == 'berita' ? 'bg-gray-700 text-white' : '' }}">
        Berita
      </a>
      <a href="{{ route("admin.post.index", ["kategori" => "pengumuman"]) }}"
        class="block py-2 hover:bg-gray-700 hover:text-white {{ request('kategori') == 'pengumuman' ? 'bg-gray-700 text-white' : '' }}">
        Pengumuman
      </a>
      <a href="{{ route("admin.post.index") }}"
        class="block py-2 hover:bg-gray-700 hover:text-white">
        Tampilkan Semua
      </a>
    </div>
  </button>
</div>

@if ($posts->isEmpty())
<h2 class="text-2xl mt-4">Data Tidak Ditemukan</h2>
@else
<div
  class="shadow-md overflow-hidden border-b border-gray-200 rounded-md w-full my-4">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-300">
      <tr>
        <th scope="col"
          class="w-1/5 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider hidden md:table-cell">
          Sampul
        </th>
        <th scope="col"
          class="md:w-1/3 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
          Judul
        </th>
        <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
          Kategori
        </th>
        <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider  hidden md:table-cell">
          Tanggal
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach ($posts as $post)
      <tr onclick="location.href='{{ route("admin.post.edit", $post) }}'"
        class="cursor-pointer hover:bg-gray-100">
        @if ($post->sampul)
        <td class="w-1/5 px-6 py-4 whitespace-nowrap hidden md:table-cell">
          <div class="aspect-w-16 aspect-h-9">
            <img src="{{ asset("storage/".$post->sampul) }}"
              alt="{{ $post->judul }}"
              class="w-full object-center object-cover" />
          </div>
        </td>
        @else
        <td class="w-1/5 px-6 py-4 whitespace-nowrap hidden md:table-cell">
          <div class="aspect-w-16 aspect-h-9">
            <img src="{{ asset("storage/sampul-post/sampul-default.jpg") }}"
              alt="{{ $post->judul }}"
              class="w-full object-center object-cover" />
          </div>
        </td>
        @endif
        <td class="md:w-1/3 px-6 py-4">
          <div class="text-sm text-gray-900">{{ $post->judul }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
          <span
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            {{ $post->kategori->nama }}
          </span>
        </td>
        <td
          class="px-6 py-4 whitespace-nowrap text-sm text-gray-500  hidden md:table-cell">
          {{ $post->created_at->format('d, M Y') }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{ $posts->links() }}
@endif

@endsection
{{-- <p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad, eos cum perferendis dolorum deserunt corrupti aperiam fugit. Non, iure tempore?
</p>
<p>
  Nesciunt, voluptate nobis. Ratione nulla molestiae laborum nam esse atque nostrum unde quos totam suscipit aperiam dolorum reprehenderit dolores consectetur iusto tempora quae ex velit illo maiores commodi, at pariatur.
</p>
<p>
  Ullam harum minima molestiae quaerat nam esse ducimus earum nisi, asperiores magnam. Molestiae aliquam repellat animi minima amet labore, modi ad voluptatibus cupiditate natus ipsum, perferendis quia expedita officia perspiciatis?
</p>
<p>
  Id corporis facere itaque possimus delectus nisi molestias, nihil tempora vitae sequi deleniti fuga adipisci. Voluptatem harum, eaque hic facere minima dignissimos voluptates eius. Quo reprehenderit architecto possimus unde provident?
</p>
<p>
  Eaque corporis, enim nulla placeat suscipit vitae corrupti rem provident consequatur voluptates laboriosam omnis. Doloremque alias eaque repellat nihil, tempore minima officiis, impedit assumenda repellendus soluta mollitia ut dignissimos tempora.
</p> --}}