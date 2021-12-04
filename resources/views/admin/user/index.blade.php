@extends("admin.layouts.main")

@section('content')

  <a href="{{ route('admin.user.create') }}"
    class="bg-blue-700 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-blue-600">
    <i class="fas fa-plus mr-3"></i> Tambah User
  </a>

  @if (session()->has('success'))
    <div class="w-full bg-green-200 py-3 px-3 text-green-900 mt-6 rounded">
      {{ session('success') }}
    </div>
  @endif

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
            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
            Email
          </th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
            Role
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($users as $user)
          <tr @if ($user->id !== auth()->user()->id) onclick="location.href='{{ route('admin.user.edit', $user) }}'" @endif class="cursor-pointer hover:bg-gray-100">
            <td class="px-6 py-4 text-sm text-gray-700">
              {{ $user->name }}
              @if ($user->id === auth()->user()->id)
                <span class="px-2 font-semibold">(Current User)</span>
              @endif
            </td>
            <td class="px-6 py-4 text-sm text-gray-500 hidden md:table-cell">
              {{ $user->email }}
            </td>
            <td class="px-6 py-4 text-sm hidden md:table-cell">
              @if ($user->is_admin)
                <span
                  class="px-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-green-100">
                  Admin
                </span>
              @else
                <span
                  class="px-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-600 text-blue-100">
                  Staff
                </span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
