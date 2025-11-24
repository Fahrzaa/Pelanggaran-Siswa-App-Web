@extends('layouts.main')

@section("kont")
<div class="notif">
    @if (session('updates'))
        <span class="rounded-lg p-3 bg-green-600 text-white font-semibold">{{ session('updates') }}</span>
    @endif
</div>
<div class=" mt-5 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">Pengaturan Akun</h2>
    <form action="/update-siswa/store/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ $siswa->nama }}" 
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="number" class="block text-gray-700">Email</label>
            <input type="number" name="nis" id="email" value="{{ $siswa->nis }}"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Foto Profil -->
        <div class="mb-4">
           <label for="number" class="block text-gray-700">Alamat</label>
            <input type="text" name="email" id="email" value="{{ $siswa->alamat }}"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- Password -->
        <div class="mb-4">
           <label for="number" class="block text-gray-700">poin</label>
            <input type="number" name="poin" id="email" value="{{ $siswa->poin }}"
                   class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300">
        </div>

        <div class="flex gap-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            Simpan Perubahan
        </button>
        <a href="{{ route('list-siswa', $siswa->kelas_id) }}" type="submit" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-blue-700">
           Kembali
        </a>
        </div>
    </form>
</div>
@endsection
