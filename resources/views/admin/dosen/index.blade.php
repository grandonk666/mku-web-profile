@extends("admin.layouts.main")

@section('content')

  <a href="{{ route('admin.dosen.create') }}"
    class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
    <i class="fas fa-plus mr-3"></i> Tambah Data Dosen
  </a>

  @if (session()->has('success'))
    <div class="w-full bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
      {{ session('success') }}
    </div>
  @endif

  <div
    class="w-full md:w-1/2 flex flex-col md:flex-row items-start md:items-center justify-between mt-6 gap-4">
    <form action="{{ route('admin.dosen.index') }}"
      class="w-full md:w-auto flex items-center bg-white rounded-md border border-gray-500">
      @if (request('matakuliah'))
        <input type="hidden" name="matakuliah"
          value="{{ request('matakuliah') }}">
      @endif
      <div class="w-full">
        <input type="text" name="search" value="{{ request('search') }}"
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
      <span class="text-lg">Matakuliah</span>
      <i class="fas fa-angle-down ml-2"></i>
      <div
        class="dropdown-menu hidden left-0 top-10 absolute w-40 bg-white rounded-lg shadow-lg py-1 border border-gray-500">
        @foreach ($listMatakuliah as $matakuliah)
          <a href="{{ route('admin.dosen.index', ['matakuliah' => $matakuliah->slug]) }}"
            class="block py-2 hover:bg-gray-700 hover:text-white {{ request('kategori') == $matakuliah->slug ? 'bg-gray-700 text-white' : '' }}">
            {{ $matakuliah->nama }}
          </a>
        @endforeach
        <a href="{{ route('admin.dosen.index') }}"
          class="block py-2 hover:bg-gray-700 hover:text-white">
          Tampilkan Semua
        </a>
      </div>
    </button>
  </div>

  <div
    class="shadow-md overflow-hidden border-b border-gray-200 rounded-md w-full my-4">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-300">
        <tr>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
            Nama
          </th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider hidden md:table-cell">
            Jabatan
          </th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
            Matakuliah
          </th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider hidden md:table-cell">
            NIP
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($listDosen as $dosen)
          <tr onclick="location.href='{{ route('admin.dosen.edit', $dosen) }}'"
            class="cursor-pointer hover:bg-gray-100">
            <td class="px-6 py-4">
              <div class="flex items-center">
                <div class="hidden md:block flex-shrink-0 h-10 w-10">
                  @if ($dosen->foto)
                    <img class="h-10 w-10 rounded-full object-cover"
                      src="{{ asset('storage/' . $dosen->foto) }}"
                      alt="{{ $dosen->nama }}">
                  @else
                    <img class="h-10 w-10 rounded-full object-cover"
                      src="{{ asset('storage/foto-dosen/foto-default.jpg') }}"
                      alt="{{ $dosen->nama }}">
                  @endif
                </div>
                <div class="md:ml-4">
                  <div class="text-sm font-medium text-gray-900">
                    {{ $dosen->nama }}
                  </div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 hidden md:table-cell">
              <div class="text-sm text-gray-900">
                @if ($dosen->struktur)
                  {{ $dosen->struktur->jabatan }}
                @else
                  Dosen Reguler
                @endif
              </div>
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
              @if ($dosen->matakuliah)
                {{ $dosen->matakuliah->nama }}
              @else
                Kosong
              @endif
            </td>
            <td class="px-6 py-4 text-sm text-gray-500 hidden md:table-cell">
              @if ($dosen->nip)
                {{ $dosen->nip }}
              @else
                Kosong
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ $listDosen->links() }}
@endsection
