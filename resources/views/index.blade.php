<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Pelanggaran Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');     
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
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
  }
    .fade-up {
        animation: fadeUp 1s ease-out forwards;
    }
    .fade-up-2{
         animation: fadeUp 2s ease-out forwards;
    }
    .slideLeft-1 {
        animation: slideLeft 1s ease-out forwards;
    }
    .slideLeft-2 {
        animation: slideLeft 1.5s ease-out forwards;
    }
    .slideLeft-3 {
        animation: slideLeft 2s ease-out forwards;
    }
    .fade-up-3 {
         animation: fadeUp 3s ease-out forwards;
        }
        .slideRight {
        animation: slideRight 1s ease-out forwards;
    }
    .slideRight-2 {
        animation: slideRight 2s ease-out forwards;
    }

    .btn1:hover, .btn2:hover {
        background-color: tomato;
        color: beige;
        transition: all 0.3s ease;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transform: translateX(10px);
    }

    .stagger-1, .stagger-2, .stagger-3 {
    opacity: 0;
    transform: translateY(30px); 
}
   
    .stagger-1 {
    animation: fadeUp 1s ease-out forwards;
    animation-delay: 0s; /* Muncul langsung */
}
    .stagger-2 {
    animation: fadeUp 1s ease-out forwards;
    animation-delay: 0.3s; /* Muncul 0.5 detik setelah yang pertama */
}
    .stagger-3 {
    animation: fadeUp 1s ease-out forwards;
    animation-delay: 0.6s; /* Muncul 1 detik setelah yang pertama */
}

    </style>

    <nav class="navbar flex fade-up justify-around items-center text-white w-screen fixed p-4 border-box z-10">
        <div class="brand flex gap-4 items-center">
            <img src="{{asset('images/wolf.png')}}" class="h-10" alt="">
        <h1 class="font-semibold text-2xl text-blue-500">Pelanggaran Siswa</h1>
        </div>
        <div class="list flex gap-2">
           <a href="/regis" onmouseover="regis()" class="btn1 p-2 bg-white rounded-lg text-center w-21 text-gray-400">Sign In</a>
            <a href="/login" onmouseover="login()" class="btn2 p-2 bg-white rounded-lg text-center w-21 text-gray-400">Login</a>
        </div>
    </nav>

    <section class="main flex items-center justify-center flex-col h-screen relative">        
    
        <h2 class="w-55 duration-500 ease-in-out slideRight text-gray-200 bg-blue-600 p-2 pr-3 pl-3 mb-3 mr-60 text-center rounded-lg" id="judul">TUGAS SEMESTER AKHIR</h2>
        <h1 class="font-bold text-4xl slideLeft-2"> SI PELANGGARAN <span class="text-blue-600 underline">SISWA!</span></h1>
        <span id="typing" class="text-center slideRight mt-4"> </span>
        <div class="btn gap-7 mt-6 flex">  
            <a href="/dashboard" onmouseover="start()" class="btn1 p-2 w-35 slideLeft-3 text-center text-gray-300 rounded-3xl bg-gray-900">Get Started</a>
            <a href="" onmouseover="learn()" class="btn2 p-2 w-35 slideRight-2 rounded-3xl"><i class="bi bi-arrow-left"></i> &nbsp;Learn More</a>
        </div> 
        </div>   

        <footer class="footer absolute bottom-7 text-gray-900 text-center w-full flex flex-col items-center">
        <div class="line gap-5 mb-5 flex flex-row items-center"><hr class="w-30 text-gray-600 slideLeft-2">
        <h1 class="fade-up">🎬Directed By</h1>
        <hr class="w-30 text-gray-600 slideRight"></div>
        <div class="footer-items">
        <div class="nama-kel flex flex-row gap-10 justify-center mt-2">
         <p class="stagger-1">🎧 FAHREZA</p>
         <p class="stagger-2">🛠️ FAHREZA</p>
         <p class="stagger-3">📖 FAHREZA</p>
        </div>
        </div>
         </footer>

    </section>  
    <script>
        const judul = document.getElementById('judul');

        function learn() {
            judul.textContent = "AYO KITA PELAJARI 🔭"
            judul.style.backgroundColor = "tomato";
        }
        function start() {
            judul.textContent = "AYO KITA MULAI ⛵";
            judul.style.backgroundColor = "black";
        }
        function login() {
            judul.textContent = "MAU LOGIN ANTUM 🗽";
        }
        function regis() {
            judul.textContent = "MAU REGIS KAH 🌌";
        }
    </script>

</body>
</html>
