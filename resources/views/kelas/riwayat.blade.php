@extends ("layouts.main")

@section ("kont")
<div class="">
    <div class="header flex justify-between items-center mb-2 w-full">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">RIWAYAT PELANGGARAN</h1>
    </div>
</div>

<div class="relative shadow-md sm:rounded-lg overflow-hidden">    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 slideRight dark:text-gray-400">
        <thead class="text-xs slideRight text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">NAMA SISWA</th>
                <th scope="col" class="px-6 py-3">PELANGGARAN</th>
                <th scope="col" class="px-6 py-3">POIN</th>
                <th scope="col" class="px-6 py-3">TANGGAL</th>
                <th scope="col" class="px-6 py-3">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $r => $items)
            <tr style="animation-delay:{{ $loop->index * 170}}ms;opacity:0;" class="bg-white slideRight dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $items->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $items->siswa->nama ?? '-' }}
                </td>
                <td class="px-6 py-4">
                    {{ $items->pelanggaran->nama_pelanggaran ?? 'Tidak ada' }}
                </td>
                <td class="px-6 py-4">
                    {{ $items->poin }}
                </td>
                <td class="px-6 py-4">
                    {{ $items->created_at->format('d-m-Y') }}
                </td>
                <td class="px-6 py-4 gap-3 flex text-right">
                    <a href="/pelanggaran/edit/{{ $items->id }}" class="font-medium text-white bg-blue-600 px-3 py-2 rounded-md hover:underline">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="{{ route('form-tambah-poin', $items->id) }}" class="font-medium text-white bg-orange-600 px-3 py-2 rounded-md hover:underline">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </a>
                    <form action="/riwayat/delete/{{ $items->id }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin Mau Di Hapus?')" class="font-medium text-white bg-red-600 px-3 py-2 rounded-md cursor-pointer hover:underline">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection