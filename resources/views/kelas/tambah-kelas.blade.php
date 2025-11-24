@extends('layouts.main')

@section('kont')
<div class="w-full max-w-2xl bg-white shadow-lg rounded-2xl p-8 mt-0">
  <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
    Tambah Kelas
  </h1>

  <form action="/tambah-kelas/store" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
    @csrf

    <div>
      <label for="jenis" class="block text-gray-600 font-medium mb-2">Nama Kelas</label>
      <input type="text" id="jenis" name="nama" 
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
        @error('nama')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
    </div>

    <div>
      <label for="poin" class="block text-gray-600 font-medium mb-2">Deskripsi Kelas</label>
      <textarea id="poin" name="poin"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
        
    </textarea>
     @error('poin')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
    </div>

    <div>
      <label for="Tingkat Pelanggaran" class="block text-gray-600 font-medium mb-2">Tambahkan Foto Kelas</label>
        <input type="file" name="foto" id="">
         @error('foto')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
      </div>

    <div class="flex justify-between mt-4">
      <a href="/kelas"
        class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md font-medium transition">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
      <button type="submit"
        class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium shadow transition">
        <i class="bi bi-save"></i> Simpan
      </button>
    </div>
  </form>
</div>
@endsection
