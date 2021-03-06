@extends("admin.layouts.main")

@section("content")

<a href="{{ route("admin.struktur.create") }}"
  class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
  <i class="fas fa-plus mr-3"></i> Tambah Jabatan
</a>

@if (session()->has("success"))
<div class="w-full bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
  {{ session("success") }}
</div>
@endif

<div
  class="shadow overflow-hidden border-b border-gray-200 rounded-md w-full mt-4">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-300">
      <tr>
        <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
          Nama
        </th>
        <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
          Jabatan
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach ($listStruktur as $struktur)
      <tr
        onclick="location.href='{{ route("admin.struktur.edit", $struktur) }}'"
        class="cursor-pointer hover:bg-gray-100">
        <td class="px-6 py-4">
          <div class="flex items-center">
            <div class="hidden md:block flex-shrink-0 h-10 w-10">
              @if ($struktur->dosen->foto)
              <img class="h-10 w-10 rounded-full object-cover"
                src="{{ asset("storage/". $struktur->dosen->foto) }}"
                alt="{{ $struktur->dosen->nama }}">
              @else
              <img class="h-10 w-10 rounded-full object-cover"
                src="{{ asset("storage/foto-dosen/foto-default.jpg") }}"
                alt="{{ $struktur->dosen->nama }}">
              @endif
            </div>
            <div class="md:ml-4">
              <div class="text-sm font-medium text-gray-900">
                {{ $struktur->dosen->nama }}
              </div>
            </div>
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="text-sm text-gray-900">{{ $struktur->jabatan }}</div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection