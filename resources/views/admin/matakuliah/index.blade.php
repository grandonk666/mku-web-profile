@extends("admin.layouts.main")

@section('content')

    <a href="{{ route('admin.matakuliah.create') }}"
        class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
        <i class="fas fa-plus mr-3"></i> Tambah Data Matakuliah
    </a>

    @if (session()->has('success'))
        <div class="w-full bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="shadow-md overflow-hidden border-b border-gray-200 rounded-md w-full mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        Nama Matakuliah
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider hidden md:table-cell">
                        Dosen Pengajar
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($listMatakuliah as $matakuliah)
                    <tr onclick="location.href='{{ route('admin.matakuliah.edit', $matakuliah) }}'"
                        class="cursor-pointer hover:bg-gray-100">
                        <td class="px-6 py-4">
                            {{ $matakuliah->nama }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <ul class="list-disc">
                                @forelse ($matakuliah->listDosen  as $dosen)
                                    <li class="py-1">
                                        {{ $dosen->nama }}
                                    </li>
                                @empty
                                    <li>
                                        Belum ada dosen pengajar
                                    </li>
                                @endforelse
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
