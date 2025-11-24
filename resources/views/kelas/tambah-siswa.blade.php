
@extends('layouts.main')

@section('kont')
<div class="w-full  bg-white shadow-lg rounded-2xl p-8 mt-0">
  <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
    Tambah Siswa
  </h1>

  <form action="/tambah-siswa/store" method="POST" class="flex flex-col gap-5" >
    @csrf

    <div>
      <label for="jenis" class="block text-gray-600 font-medium mb-2">Nama Siswa</label>
      <input type="text" id="jenis" name="nama" 
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
        @error('nama')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
    </div>

    <div>
      <label for="poin" class="block text-gray-600 font-medium mb-2">NIS</label>
      <input type="number" id="poin" name="nis" min="1"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
         @error('nis')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
      </div>
   
      <div>
      <label for="poin" class="block text-gray-600 font-medium mb-2">POIN PELANGGARAN ( KOSONGKAN WOK )</label>
      <input type="number" id="poin" name="poin" min="1"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
         @error('poin')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
      </div>

    <div>
      <label for="Tingkat Pelanggaran" class="block text-gray-600 font-medium mb-2">Alamat Siswa</label>
      <textarea id="keterangan" name="alamat" rows="3" value="{{old ('email')}}"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"></textarea>
         @error('alamat')
            <p class="text-gray-600">{{$message}}</p>
        @enderror
      </div>

      <div class="enum">
        <label for="kelas_id">Pilih Kelas:</label>
         <select name="kelas_id" required>
        @foreach ($kelas as $k)
          <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
         @endforeach
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
