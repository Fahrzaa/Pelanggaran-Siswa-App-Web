<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
  <div class="bg-gray-800 p-6 rounded-2xl shadow-lg w-96 text-center">
    <h1 class="text-2xl font-bold mb-4">🌦️ Info Cuaca</h1>

    <form method="GET" action="/weather" class="mb-4 flex gap-2">
      <input 
        type="text" 
        name="city" 
        placeholder="Masukkan nama kota..." 
        class="flex-grow p-2 rounded bg-gray-700 text-white focus:outline-none"
        value="{{ $city }}">
      <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Cari</button>
    </form>

    @if(isset($weatherData['main']))
      <div class="space-y-2">
        <h2 class="text-xl font-semibold">{{ $weatherData['name'] }}</h2>
        <p class="text-3xl font-bold">{{ round($weatherData['main']['temp']) }}°C</p>
        <p class="capitalize">{{ $weatherData['weather'][0]['description'] }}</p>
        <p>💧 Kelembapan: {{ $weatherData['main']['humidity'] }}%</p>
        <p>💨 Angin: {{ $weatherData['wind']['speed'] }} m/s</p>
      </div>
    @elseif(isset($weatherData['message']))
      <p class="text-red-400 mt-4">{{ ucfirst($weatherData['message']) }}</p>
    @else
      <p>Masukkan kota untuk melihat cuaca.</p>
    @endif
  </div>
</body>
</html>
