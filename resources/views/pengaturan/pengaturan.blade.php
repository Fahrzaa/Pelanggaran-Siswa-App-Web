@extends('layouts.main')

@section("kont")

<div class=" bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Pengaturan Akun</h2>

    <!-- Form Edit User -->
    <form action="/pengaturan/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Foto Profil -->
        <div class="mb-4">
            <label for="foto" class="block text-gray-700">Foto Profil</label>
            <input type="file" name="foto" id="foto" accept="image/*"
                   class="w-full border rounded-md p-2">
            @if(Auth::user()->foto)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" 
                     alt="Foto Profil" class="w-20 h-20 rounded-full mt-2 border">
            @endif
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password Baru</label>
            <input type="password" name="password" id="password"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
