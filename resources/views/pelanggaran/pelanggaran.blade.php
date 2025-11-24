@extends ('layouts.main')

@section ('kont')
  <header>
    <h1 class="text-2xl font-semibold fade-up">Jenis Pelanggaran</h1>
    <p class="fade-up-2">Daftar untuk mencatat dan menilai kenakalan siswa yhoii</p>
  </header>

  <div class="atasan flex justify-between items-center mt-6">
     <a class="px-5 py-2 rounded-md bg-blue-600 text-white slideLeft border-box w-45 font-medium" href="/pelanggaran/add">TAMBAH DAFTAR</a>
    <div class="info py-2 px-5 bg-yellow-300 rounded-md slideRight">
        <p class="text-white-800">INFO :  @if (session('hapus')){{ session('hapus') }}@endif @if (session('ditambahkan')){{ session('ditambahkan') }}@endif</p>

    </div>
  </div>
   
    <div class="relative overflow-hidden mt-0 shadow-md sm:rounded-lg">
        
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase slideLeft bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   JENIS PELANGGARAN
                </th>
                <th scope="col" class="px-6 py-3">
                    POIN PELANGGARAN
                </th>
                <th scope="col" class="px-6 py-3">
                    DESKRIPSI
                </th>
                <th scope="col" class="px-6 py-3">
                    TINGKAT KENAKALAN
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPel as $item)
             
            <tr style="animation-delay: {{ $loop->index * 170}}ms;opacity:0;" class="bg-white  slideLeft dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$item->nama_pelanggaran}}
                </th>
                <td class="px-6 py-4">
                    {{$item->poin}}
                </td>
                <td class="px-6 py-4">
                    {{$item->deskripsi}}
                </td>
                <td class="px-6 py-4">
                    {{$item->kategori}}
                </td>
              
                <td class="px-6 py-4 gap-3 flex text-right">
                    <a href="/pelanggaran/edit/" class="font-medium text-white bg-blue-600 px-3 py-2 rounded-md dark:text-white-500 hover:underline">Edit</a>
                    <form action="/pelanggaran/hapus/{{ $item->id }}" method="POST">
                    @csrf
                  @method('DELETE')
                    <button type="submit"onclick="return confirm('Yakin Mau Di Hapus?')" class="font-medium text-white bg-red-600 px-3 py-2 rounded-md dark:text-white-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>

@endsection