@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-10">{{ $title }}</h1>

<a href="/admin/post/create" class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
  <i class="fas fa-plus mr-3"></i> Tambah Post
</a>

@if (session()->has("success"))
<div class="w-4/5 bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
  {{ session("success") }}
</div>
@endif

<table class="w-4/5 bg-white mt-4 text-sm">
  <thead class="bg-gray-800 text-white">
    <tr>
      <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Sampul</th>
      <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Judul</th>
      <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Kategori</th>
      <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal</td>
    </tr>
  </thead>
  <tbody class="text-gray-700">
    @foreach ($posts as $post)
    <tr onclick="location.href='/admin/post/{{ $post->id }}/edit'" class="border border-gray-300 hover:bg-gray-200 cursor-pointer">
      @if ($post->sampul)
      <td class="w-1/4 text-left p-3">
        <div class="aspect-w-16 aspect-h-9">
          <img src="{{ asset("storage/".$post->sampul) }}" alt="{{ $post->judul }}" class="w-full object-center object-cover" />
        </div>
      </td>
      @else
      <td class="w-1/4 text-left p-3">
        <div class="aspect-w-16 aspect-h-9">
          <img src="{{ asset("storage/sampul-post/sampul-default.jpg") }}" alt="{{ $post->judul }}" class="w-full object-center object-cover" />
        </div>    
      </td>
      @endif
      <td class="w-1/4 text-left py-3 px-4">{{ $post->judul }}</td>
      <td class="w-1/4 text-left py-3 px-4 capitalize">
        {{ $post->kategori->nama }}
      </td>
      <td class="w-1/4 text-left py-3 px-4 tracking-wide">
        {{ $post->created_at->format('d, M Y') }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

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