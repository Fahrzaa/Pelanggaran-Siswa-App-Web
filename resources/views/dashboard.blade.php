<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pelanggaran Siswa Dashboard</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');     
  body {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
  }
  .first-tab {
    border-radius: 10px 10px 0px 0px;
  }
  .sec-tab {
     border-radius: 0px 0px 10px 10px;
  }
   @keyframes slideRight {
            from {
                opacity: 0;
                transform: translate(30px); 
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeUp {
            from {
             opacity: 0;
             
             transform: translateY(30px);
         }
            to {
                opacity: 1;
                transform: translateY(0);
        }
}
        @keyframes slideLeft {
            from {
            opacity: 0;
            transform: translateX(-30px);
    }
            to {
            opacity: 1;
            transform: translateX(0);
        }
  }    .fade-up {
        animation: fadeUp 0.5s ease-out forwards;
    }
    .fade-up-2{
         animation: fadeUp 0.5s ease-out forwards;
         animation-delay: 0.3s;
         opacity: 0;
         
    }
    .fade-up-3{
         animation: fadeUp 0.5s ease-out forwards;
          animation-delay: 0.6s;
        opacity: 0;
    }
    .fade-up-4{
         animation: fadeUp 1s ease-out forwards;
          animation-delay: 0.100ms;
        opacity: 0;
    }
    .slideLeft {
        animation: slideLeft 0.5s ease-out forwards;
    }
    .slideRight {
        animation: slideRight 0.5s ease-out forwards;
    }
</style>
<body class="bg-gray-100 text-gray-800">

  <section class="flex p-2 gap-2">

    <div class="w-55 bg-gray-900 text-white sticky top-0 max-h-screen flex flex-col rounded-lg p-5 overflow-y-auto">


      <h1 class="text-2xl font-bold mb-8 text-center text-blue-400 ">FRANZ FT, ZA</h1>
      
      <nav class="flex flex-col gap-4">
        <a href="/dashboard" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-house-door-fill"></i> Dashboard
        </a>
        <a href="/kelas" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-people-fill"></i> Data Siswa
        </a>
        <a href="/pelanggaran" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-exclamation-triangle-fill"></i> Pelanggaran
        </a>
        <a href="/pelanggaran/riwayat" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-chat-fill"></i> Riwayat
        </a>
        <a href="/pengaturan" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-gear-fill"></i> Pengaturan
        </a>
         
        <form action=" {{ route('logout') }}">
        <button type="submit" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-box-arrow-right"></i> Logout
        </button>
        </form>
      </nav>
    </div>

    <div class="flex-1 flex flex-col">
      <header class="p-3 bg-white shadow sticky overflow-y-auto  flex items-center rounded-md justify-between px-6">
        <h2 class="text-xl font-semibold">Dashboard</h2>

        <div class="flex items-center gap-4">
          <span class="text-gray-500 animate-bounce">Halo!, {{ Auth::user()->name }} <span></span>
          </span>
          <img src="{{ asset('storage/' .  Auth::user()->profile_picture )}}" alt="avatar" class="w-9 h-9 rounded-full border" />
        </div>
      </header>

      <main class="flex items-center justify-center p-6 flex-col gap-2">
       
        <div class="flex justify-around  w-full">
        <div class="tab shadow-[0_5px_15px_rgba(0,0,0,0.35)] rounded-lg fade-up">
          <div class="first-tab p-3 shadow-[0_5px_15px_rgba(0,0,0,0.35) w-50 text-white bg-blue-500 w-85">
            <i class="bi bi-person-fill text-5xl"></i>
            <h1 class="text-bold text-lg">Jumlah Siswa</h1>
          </div>
          <div class="sec-tab p-3 w-50 text-gray-800 bg-white-600">
            <h1 class="text-4xl font-semibold">{{ $siswa }}</h1>
          </div>
        </div>
       <div class="tab shadow-[0_5px_15px_rgba(0,0,0,0.35)] rounded-lg fade-up-2">
          <div class="first-tab p-3 shadow-[ 0,0,0,0.35) w-50 text-white bg-orange-400 w-85">
            <i class="bi bi-bank2 text-5xl"></i>
            <h1 class="text-bold text-lg">Jumlah Kelas</h1>
          </div>
          <div class="sec-tab p-3 w-50 text-gray-800 bg-white-600">
            <h1 class="text-4xl font-semibold">{{ $kelas }}</h1>
          </div>
        </div>
        <div class="tab shadow-[0_5px_15px_rgba(0,0,0,0.35)] rounded-lg fade-up-3">
          <div class="first-tab p-3 shadow-[0_5px_15px_rgba(0,0,0,0.35) w-50 text-white bg-red-600 w-85">
            <i class="bi bi-exclamation-octagon-fill text-5xl"></i>
            <h1 class="text-bold text-lg">Jumlah Pelanggaran</h1>
          </div>
          <div class="sec-tab p-3 w-50 text-gray-800 bg-white-600">
            <h1 class="text-4xl font-semibold">{{$riwayats}}</h1>
          </div>
        </div>
        </div>

        <div class="card-banner flex gap-2 items-center mt-5 ">
        <div class="banner  slideLeft flex w-sreen shadow-[0_5px_15px_rgba(0,0,0,0.35)] p-6 bg-blue-500 rounded-md text-white">
          <header>
          <h1 class="text-lg font-semibold">Hallo, {{ Auth::user()->name }}!</h1>
          <p>Web ini dirancang untuk memanajement kelakuan dan track history siswa</p>
          </header>
        </div>
        <div class="weather py-6 px-7 bg-white shadow-[0_5px_15px_rgba(0,0,0,0.35)] slideRight rounded-md text-gray-800 w-30 h-26" style="background-image: url('{{ asset('storage/' .  Auth::user()->profile_picture )}}'); background-size: cover; background-position: center;">
        </div>
        </div>

        <center><div class="header-lib mt-5 p-6 flex gap-5 fade-up-2 items-center">
          <hr class="w-40 border-t bg-gray-400">
          <h1 class="font-semibold ">Top Singko Siswa</h1>
          <hr class="w-40 border-t bg-gray-400">
        </div></center>

       <div class="img-lib p-6">
  <div class="flex items-center justify-between p-5 mb-6">
    <h2 class="text-2xl slideRight font-semibold text-gray-800">Riwayat Pelanggaran</h2>
    
  </div>

 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead data-aos="fade-up" data-aos-duration="400" class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            @foreach ($riwayat as $r)
            <tr data-aos="fade-right"  class="bg-white dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $r->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $r->siswa->nama ?? '-' }}
                </td>
                <td class="px-6 py-4">
                    {{ $r->pelanggaran->nama_pelanggaran ?? 'Tidak ada' }}
                </td>
                <td class="px-6 py-4">
                    {{ $r->poin }}
                </td>
                <td class="px-6 py-4">
                    {{ $r->created_at->format('d-m-Y') }}
                </td>
                <td class="px-6 py-4 gap-3 flex text-right">
                    <a href="/pelanggaran/edit/{{ $r->id }}" class="font-medium text-white bg-blue-600 px-3 py-2 rounded-md hover:underline">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="{{ route('form-tambah-poin', $r->id) }}" class="font-medium text-white bg-orange-600 px-3 py-2 rounded-md hover:underline">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </a>
                    <form action="/riwayat/delete/{{ $r->id }}" method="POST" class="inline">
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
</div>

      </main>

    </div>
  </section>
  

</body>
</html>
