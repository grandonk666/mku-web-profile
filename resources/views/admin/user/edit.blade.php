@extends("admin.layouts.main")

@section('content')

  <form method="POST" action="{{ route('admin.user.update', $user) }}"
    class="p-3 md:p-10 bg-white rounded shadow-md w-full mb-4">
    @method('PUT')
    @csrf
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="name">Name</label>
      <input
        class="w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800
        @error('name') border-red-500 @enderror"
        id="name" name="name" type="text" placeholder="Name" aria-label="name"
        value="{{ old('name', $user->name) }}">
      @error('name')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="email">Email</label>
      <input
        class="w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800
        @error('email') border-red-500 @enderror"
        id="email" name="email" type="email" placeholder="Email"
        aria-label="email" value="{{ old('email', $user->email) }}">
      @error('email')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6 relative">
      <label class="block text-sm text-gray-700" for="password">
        Password <span class="text-xs text-gray-500">(Biarkan kosong jika tidak
          mau mengganti password)</span>
      </label>
      <input
        class="w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 focus:border-gray-800
        @error('password') border-red-500 @enderror"
        id="password" name="password" type="password" placeholder="Password"
        aria-label="password">
      <div id="passwordTogle">
        <span id="showIcon"
          class="absolute top-1/2 right-0 pr-3 text-xl flex text-gray-600 cursor-pointer">
          <i class="fas fa-eye"></i>
        </span>
        <span id="hideIcon"
          class="absolute top-1/2 right-0 pr-3 text-xl hidden text-gray-600 cursor-pointer">
          <i class="fas fa-eye-slash"></i>
        </span>
      </div>
      @error('password')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-6">
      <label class="block text-sm text-gray-700" for="is_admin">
        Role
      </label>
      <select
        class="w-full px-5 py-1 text-gray-800 bg-gray-100 rounded outline-none border-2 
        focus:border-gray-800 @error('is_admin') border-red-500 @enderror"
        name="is_admin" id="is_admin">
        <option value=""> -- Pilih Role -- </option>
        <option value="1" @if ($user->is_admin) selected @endif>Admin</option>
        <option value="0" @if (!$user->is_admin) selected @endif>Staff</option>
      </select>
      @error('is_admin')
        <span class="text-xs font-bold text-red-500">{{ $message }}</span>
      @enderror
    </div>
    <div class="flex gap-3">
      <button
        class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-500 rounded outline-none"
        type="submit">Simpan Perubahan</button>

      <a href="{{ route('admin.user.index') }}"
        class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-600 rounded">Batal</a>
    </div>
  </form>

  <form action="{{ route('admin.user.destroy', $user) }}" method="post">
    @method("delete")
    @csrf

    <button onclick="return confirm('Anda Yakin Ingin Menghapus ?')"
      class="bg-red-500 text-white font-semibold py-2 px-3 rounded-br-md rounded-bl-md rounded-tr-md shadow hover:shadow-lg hover:bg-red-400">
      <i class="fas fa-trash mr-3"></i> Hapus User
    </button>

  </form>

@endsection

@section('script')

  <script>
    const passwordInput = document.querySelector('#password');
    const passwordTogle = document.querySelector('#passwordTogle');
    const showIcon = document.querySelector('#showIcon');
    const hideIcon = document.querySelector('#hideIcon');

    passwordTogle.addEventListener('click', (e) => {
      const type = passwordInput.getAttribute('type') === 'password' ?
        'text' : 'password';
      passwordInput.setAttribute('type', type);

      showIcon.classList.toggle('hidden');
      showIcon.classList.toggle('flex');
      hideIcon.classList.toggle('hidden');
      hideIcon.classList.toggle('flex');
    });
  </script>

@endsection
