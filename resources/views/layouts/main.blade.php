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
        opacity: 0;
    }
  
</style>
<body class="bg-gray-100 text-gray-800">

  <section class="flex h-screen p-2 gap-2">

    <div class="w-55 bg-gray-900 text-white h-screen flex flex-col rounded-lg p-5">
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
        <a href="/logout" class="flex items-center gap-3 hover:bg-blue-800 p-2 rounded-md transition">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </nav>
    </div>

    <div class="flex-1 flex flex-col">
      <header class="p-3 bg-white shadow flex items-center rounded-md justify-between px-6">
        <h2 class="text-xl font-semibold">Dashboard</h2>

        <div class="flex items-center gap-4">
          <span class="text-gray-500 animate-bounce">Halo!, {{ Auth::user()->name }} <span></span>
          </span>
          <img src="{{ asset('storage/' .  Auth::user()->profile_picture )}}" alt="avatar" class="w-9 h-9 rounded-full border" />
        </div>
      </header>

      <main class="flex p-6 text-left flex-col gap-2">
        @yield ('kont')
      </main>

    </div>
  </section>

</body>
</html>
