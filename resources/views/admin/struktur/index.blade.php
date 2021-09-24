@extends("admin.layouts.main")

@section("content")

<h1 class="text-4xl text-black mb-10">{{ $title }}</h1>

<a href="/admin/struktur/create" class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
  <i class="fas fa-plus mr-3"></i> Tambah Jabatan
</a>

@if (session()->has("success"))
<div class="w-1/2 bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
  {{ session("success") }}
</div>
@endif

<table class="w-1/2 bg-white mt-4 shadow-md text-sm">
  <thead class="bg-gray-800 text-white">
    <tr>
      <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Jabatan</th>
      <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Dosen</th>
    </tr>
  </thead>
  <tbody class="text-gray-700">
    @foreach ($listStruktur as $struktur)
      
    <tr onclick="location.href='/admin/struktur/{{ $struktur->id }}/edit'" class="border border-gray-300 hover:bg-gray-200 cursor-pointer">
      <td class="w-1/2 text-left py-3 px-4">{{ $struktur->jabatan }}</td>
      <td class="w-1/2 text-left py-3 px-4">{{ $struktur->dosen->nama }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection