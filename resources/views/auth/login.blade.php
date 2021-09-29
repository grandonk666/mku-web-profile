@extends("layouts.main")

@section("content")

<section class="min-h-screen flex items-stretch text-black">
    <div class="lg:flex w-3/5 hidden bg-no-repeat bg-cover relative items-center" style="background-image: url({{ asset("home-hero.jpg") }});">
      <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="w-full px-24 z-10 text-white">
          <h1 class="text-5xl font-bold text-left tracking-wide">Matakuliah Umum</h1>
          <p class="text-3xl my-4">UPN "Veteran" Jawa Timur</p>
        </div>
      </div>
      <div class="lg:w-2/5 w-full flex items-center justify-center text-center md:px-16 px-0 z-0 bg-white">
          <div class="absolute lg:hidden z-10 inset-0 bg-no-repeat bg-cover items-center" style="background-image: url({{ asset("home-hero.jpg") }});">
              <div class="absolute bg-black/60 inset-0 z-0"></div>
          </div>
          <div class="w-full py-6 z-20">
            <h1 class="text-5xl tracking-wider font-bold mb-8 text-gray-700 uppercase">Login</h1>
            @if (session()->has("login-error"))
            <div class="w-full bg-red-200 p-2 text-red-900 my-6 rounded">
              {{ session("login-error") }}
            </div>
            @endif
              <form action="{{ route("authenticate") }}" method="POST" class="w-full px-4 lg:px-0 mx-auto">
                @csrf

                  <div class="relative mb-8">
                    <input
                      id="email"
                      type="email"
                      name="email"
                      class="peer h-10 w-full border-b-2 text-gray-900 placeholder-transparent focus:outline-none focus:border-indigo-500 @error("email") border-red-500 @enderror"
                      placeholder="Email Address"
                    />
                    <label
                      for=email
                      class="absolute left-0 -top-5 text-gray-800 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-gray-800 peer-focus:text-sm"
                    >
                      Email
                    </label>
                    @error("email")
                    <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="relative mb-8">
                    <input
                      id="password"
                      type="password"
                      name="password"
                      class="peer h-10 w-full border-b-2 text-gray-900 placeholder-transparent focus:outline-none focus:border-indigo-500 @error("password") border-red-500 @enderror"
                      placeholder="Password"
                    />
                    <label
                      for=password
                      class="absolute left-0 -top-5 text-gray-800 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-gray-800 peer-focus:text-sm"
                    >
                      Password
                    </label>
                    @error("password")
                    <span class="text-xs font-bold text-red-500" >{{ $message }}</span>
                    @enderror
                  </div>
                
                <div class="px-4 pb-2 pt-4">
                    <button class="uppercase block w-full p-4 text-lg rounded-lg text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none">Login</button>
                </div>
              </form>
          </div>
      </div>
</section>

@endsection