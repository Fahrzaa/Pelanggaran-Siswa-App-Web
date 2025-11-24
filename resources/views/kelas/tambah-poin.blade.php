@extends('layouts.main')

@section('kont')
<form action="{{ route('tambah-poin', $siswa->id) }}" method="POST">
    @csrf
    <div class="flex flex-col w-full">

        <div class="main w-full flex flex-row gap-5 fade-up">
            <!-- Form Tambah Poin -->
            <div class="flex flex-col w-full px-6 py-4 bg-white rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Tambah Poin untuk {{ $siswa->nama }}</h2>

              <div class="mb-4">
    <label class="block mb-1">Jumlah Poin</label>
    <input type="number" id="poin" name="poin" class="w-full border px-3 py-2 rounded" required readonly>
</div>

<div class="mb-4">
    <label class="block mb-1">Jenis Pelanggaran</label>
    <select id="pelanggaran" name="pelanggaran_id" class="w-full border px-3 py-2 rounded" required>
        @foreach($pelanggaran as $p)
            <option value="{{ $p->id }}" data-poin="{{ $p->poin }}">
                {{ $p->nama_pelanggaran }}
            </option>
        @endforeach
    </select>
</div>

                <div class="mb-4">
                    <label class="block mb-1">Tanggal</label>
                    <input type="date" name="tanggal" class="w-full border px-3 py-2 rounded" required>
                </div>
            </div>
        </div>

        <div class="cihuys flex w-full shadow-lg flex-col rounded-lg fade-up-2 p-6 mt-10 bg-white">
            <h2 class="text-xl font-bold mb-4">Informasi Siswa</h2>
            <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
            <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
            <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
        </div>

        <div class="button mt-6 flex justify-end">
            <button type="submit" class="px-5 py-3 bg-blue-600 rounded-lg text-white shadow-2xl">
                Simpan Poin <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pelanggaranSelect = document.getElementById('pelanggaran');
        const poinInput = document.getElementById('poin');

        pelanggaranSelect.addEventListener('change', function () {
            const selectedOption = pelanggaranSelect.options[pelanggaranSelect.selectedIndex];
            const poin = selectedOption.getAttribute('data-poin');
            poinInput.value = poin;
        });

        // Trigger change event on page load to set initial poin value
        pelanggaranSelect.dispatchEvent(new Event('change'));
    });
</script>
@endsection