@extends('layouts.main')

@section('kont')
<div class="w-full max-w-2xl bg-white shadow-lg rounded-2xl p-8 mt-0">
  <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
    Edit Daftar Pelanggaran
  </h1>

  <form action="/pelanggaran/store" method="POST" class="flex flex-col gap-5">
    @csrf
    @foreach ($listpel as $item)
    <div>
      <label for="jenis" class="block text-gray-600 font-medium mb-2">Jenis Pelanggaran</label>
      <input type="text" id="jenis" name="jenis" value="{{$item->namaPel}}" required
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
    </div>

    <div>
      <label for="poin" class="block text-gray-600 font-medium mb-2">Poin Pelanggaran</label>
      <input type="number" id="poin" name="poin" required min="1"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" />
    </div>

    <div>
      <label for="keterangan" class="block text-gray-600 font-medium mb-2">Keterangan</label>
      <textarea id="keterangan" name="keterangan" rows="3"
        class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"></textarea>
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
    @endforeach
  </form>
</div>
@endsection
