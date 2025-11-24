<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Sign Up</title>
   @vite('resources/css/app.css')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f9fafb;
      color: #1f2937;
    }

    .text-fenrir-blue {
      color: #3B82F6;
    }

    .bg-fenrir-blue {
      background-color: #3B82F6;
    }

    .left-tab {
      width: 65%; 
      height: 100vh;
      overflow: hidden;
      background-image: url('{{ asset('images/1.jpg')}}');
      background-size: cover;
      background-position: center;
    }

    .left-tab::before {
     content: "";
     position: absolute;
     inset: 0;
      background: rgba(0, 0, 0, 0.222); 
}

    .right-tab {
      width: 100%;
      max-width: 420px;
      padding: 3rem;
    }

    input {
      background-color: #fff;
      border-radius: 8px;
      transition: all 0.2s ease;
    }

    input:focus {
      outline: none;
      box-shadow: 0 0 0 2px #3B82F6;
      border-color: transparent;
    }

    a:hover {
      opacity: 0.8;
    }

    .btn {
      transition: all 0.2s ease;
      border-radius: 10px;
    }

    .btn:hover {
      opacity: 0.9;
      transform: translateY(-1px);
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
  @keyframes fadeDown {
    from {
      opacity: 0;
      transform: translateX(0);
    }
    to {
      opacity: 1;
      transform: translateX(-30px);
    }
  }

.fade-up {
  animation: fadeUp 0.8s ease-out forwards;
}

.fade-down {
  animation: fadeDown 0.8s ease-out forwards;
}

  </style>
</head>
<body>

  <section class="main h-screen flex flex-col lg:flex-row items-center overflow-hidden justify-between">
   
    <div class="left-tab hidden lg:block fade-down"></div>

    <div class="right-tab flex flex-col justify-center text-left fade-up">
      <h1 class="text-4xl font-bold mt-0 lg:mt-20 tracking-tight">Register</h1>
      <p class="font-semibold mt-4 text-gray-600">Buat Harimu Menjadi <span class="text-fenrir-blue">Lebih Bahagia.!</span></p>

      <form action="/regis/submit" method="POST">
        @csrf
      <div class="login-input mt-3 flex flex-col gap-2">
        <label for="username" class="text-lg font-medium"><i class="bi bi-person-fill"></i>&nbsp; Username</label>
        <input type="text" class="border border-gray-300 p-2 rounded-md" name="username" placeholder="Masukin Nama Lu">
        @error('username')
         <p class="text-gray-500">{{$message}}</p>   
        @enderror
      </div>

      <div class="login-input mt-2 flex flex-col gap-2">
        <label for="password" class="text-lg font-medium"><i class="bi bi-lock-fill"></i>&nbsp; Password</label>
        <input type="password" class="border border-gray-300 p-2 rounded-md" name="password" placeholder="Masukin Password Lu">
        @error('password')
         <p class="text-gray-500">{{$message}}</p>   
        @enderror
      </div>

      <div class="login-input mt-2 flex flex-col gap-2">
        <label for="email" class="text-lg font-medium"><i class="bi bi-lock-fill"></i>&nbsp; Email</label>
        <input type="email" class="border border-gray-300 p-2 rounded-md" name="email" placeholder="Masukin Email Lu">
        @error('mail')
         <p class="text-gray-500">{{$message}}</p>   
        @enderror
      </div>

      <div class="cihuy flex justify-between items-center mt-5 text-sm text-gray-600">
        <label class="flex items-center gap-2">
          <input type="checkbox" class="accent-fenrir-blue">
          <span>Aku Sygma</span>
        </label>
        <a href="/login" class="text-fenrir-blue hover:underline">Udah Punya Account?</a>
      </div>

      <div class="btn-group flex gap-3 mt-8 justify-center">
        <button type="submit" class="btn p-2 bg-fenrir-blue text-white rounded-md w-100 text-center font-semibold">Sign Up</button>
      </div>

      <div class="namapp items-center flex my-8">
        <hr class="flex-grow border-t border-gray-300">
         <span class="mx-4 text-gray-500 font-medium">Fahrza Sygmaboi</span>
         <hr class="flex-grow border-t border-gray-300">
      </div>
      </form>
    </div>
  </section>
</body>
</html>
