@extends('layouts.main')

@section('kont')
 <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
    Tambah Data Pelanggaran
  </h1>
<div class="w-full bg-white shadow-lg rounded-2xl p-8 mt-0">
 

  <form action="/pelanggaran/store" method="POST" class="flex flex-col gap-5" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="jenis" class="block text-gray-600 font-medium mb-2">Jenis Pelanggaran</label>
      <input type="text" id="jenis" name="nama" 
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
        @error('nama')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
    </div>

    <div>
      <label for="poin" class="block text-gray-600 font-medium mb-2">Poin Pelanggaran</label>
      <input type="number" id="poin" name="poin" min="1"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
         @error('poin')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
      </div>

    <div>
      <label for="Tingkat Pelanggaran" class="block text-gray-600 font-medium mb-2">Deskripsi</label>
      <textarea id="keterangan" name="deskripsi" rows="3" value="{{old ('email')}}"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"></textarea>
         @error('tingkat')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
      </div>

      <div class="enum">
        <label for="kategori">Kategori Pelanggaran:</label>
        <select name="kategori" id="kategori" required>
        <option value="ringan">Ringan</option>
        <option value="sedang">Sedang</option>
        <option value="berat">Berat</option>
      </select>
      </div>

    <div class="flex justify-between mt-4">
      <a href="/pelanggaran"
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
