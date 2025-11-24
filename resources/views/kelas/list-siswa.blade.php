@extends ("layouts.main")

@section ("kont")
<div class="">
    <div class="header flex justify-between items-center mb-2 w-full">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 slideLeft">Daftar Siswa Kelas {{ $kelas->nama_kelas }}</h1>
    <a href="/tambah-siswa" class="px-2 py-4 bg-blue-600 slideRight font-semibold rounded-lg shadow-lg text-white">TAMBAH SISWA</a>
</div>

<div class="mb-4 mt-10">
     <span class="flex-none p-2 bg-blue-600 font-semibold text-lg slideRight rounded-lg text-white mt-10 mb-2">INFO :
    @if(session('siswa_succes'))
      {{ session('siswa_succes') }}
    @endif

    @if(session('siswa_hapus'))
      {{ session('siswa_hapus') }}
    @endif

    @if(session('siswa_destroy'))
      {{ session('siswa_destroy') }}
    @endif
  </span>
</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead data-aos="fade-right" class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   NAMA SISWA
                </th>
                <th scope="col" class="px-6 py-3">
                    POIN PELANGGARAN
                </th>
                <th scope="col" class="px-6 py-3">
                    ALAMAT
                </th>
                <th scope="col" class="px-6 py-3">
                    NIS
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
            @foreach($siswa as $index => $item)

            <tr style="animation-delay: {{ $loop->index * 170 }}ms;opacity:0;" class="bg-white slideLeft dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$item->nama}}
                </th>
                <td class="px-6 py-4">
                    {{$item->poin}}
                </td>
                <td class="px-6 py-4">
                    {{$item->alamat}}
                </td>
                <td class="px-6 py-4">
                    {{$item->nis}}
                </td>
                <td class="px-6 py-4">
                    {{$item->nis}}
                </td>
              
                <td class="px-6 py-4 gap-3 flex text-right">
                    <a href="/update-siswa/{{ $item->id }}" class="font-medium text-white bg-blue-600 px-3 py-2 rounded-md dark:text-white-500 hover:underline"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{ route('form-tambah-poin', $item->id) }}" class="font-medium text-white bg-orange-600 px-3 py-2 rounded-md dark:text-white-500 hover:underline"><i class="bi bi-exclamation-triangle-fill"></i></a>
                    <form action="/tambah-siswa/delete/{{ $item->id }}" method="POST">
                    @csrf
                  @method('DELETE')
                    <button type="submit"onclick="return confirm('Yakin Mau Di Hapus?')" class="font-medium text-white bg-red-600 px-3 cursor-pointer py-2 rounded-md dark:text-white-500 hover:underline"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
</div>

@endsection
