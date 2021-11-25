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
            <td class="px-6 py-4 text-sm text-gray-700">
              {{ $dosen->nama }}
            </td>
            <td class="px-6 py-4 hidden md:table-cell">
              <ul class="text-sm text-gray-900 list-none">
                @forelse ($dosen->struktur  as $jabatan)
                  <li>
                    {{ $jabatan->jabatan }}
                  </li>
                @empty
                  <li>
                    Dosen Reguler
                  </li>
                @endforelse
              </ul>
            </td>
            <td class="px-6 py-4 text-sm text-gray-500">
              @forelse ($dosen->matakuliah  as $matakuliah)
                <li class="py-1">
                  {{ $matakuliah->nama }}
                </li>
              @empty
                <li>
                  Kosong
                </li>
              @endforelse
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

{{-- <div>Eos non mollitia asperiores maiores. Sit natus possimus reiciendis accusamus quo. Quis quaerat magni non qui sequi atque cupiditate quis.<br>
  <figure
    data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;Jadwal.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;https://mku.rizalwaskito.xyz/storage/attachment/5B8uBWSOMW4MrYP77fFe7w8QzywLTHodDnsk3Wt5.pdf&quot;,&quot;url&quot;:&quot;https://mku.rizalwaskito.xyz/storage/attachment/5B8uBWSOMW4MrYP77fFe7w8QzywLTHodDnsk3Wt5.pdf&quot;}"
    data-trix-content-type="application/pdf"
    class="attachment attachment--file attachment--pdf"><a
      href="https://mku.rizalwaskito.xyz/storage/attachment/5B8uBWSOMW4MrYP77fFe7w8QzywLTHodDnsk3Wt5.pdf">
      <figcaption class="attachment__caption"><span
          class="attachment__name">Jadwal.pdf</span> <span
          class="attachment__size">16.86 KB</span></figcaption>
    </a></figure>
</div> --}}
