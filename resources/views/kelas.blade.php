@extends ('layouts.main')

@section ('kont')
<style>
  @keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideRight {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideLeft {
  from {
    opacity: 0;
    transform: translateX(20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in {
  animation: fadeIn 0.5s ease forwards;
  opacity: 0;
}
.animate-slide-right {
  animation: slideRight 0.5s ease forwards;
  opacity: 0;
}
.animate-slide-left {
  animation: slideLeft 0.5s ease forwards;
  opacity: 0;
}
</style>
<div class="flex items-center justify-between">    
<header class="text-left">
        <h1 class="font-semibold text-3xl animate-slide-right duration-100" >Daftar Kelas</h1>
        <p class=" animate-slide-left duration-100">Klik salah satu kelas untuk melihat data siswa</p>
    </header>
<div class="button">
  <a href="/tambah-kelas" class="py-3 animate-slide-right px-5 bg-blue-600 rounded-lg text-white font-semibold shadow-lg">TAMBAH KELAS</a>
</div>
</div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-5 mt-10">
  @foreach ($ambilKelas as $kelas)
    <div class="lib-card bg-white w-75 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden animate-fade-in " style="animation-delay: {{ $loop->index * 170 }}ms;">
      <img src="{{ asset('storage/' . $kelas->images) }}" alt="Foto kelas" class="w-full h-48 object-cover">
      <div class="p-4">
        <h1 class="text-lg font-semibold text-gray-800">{{ $kelas->nama_kelas }}</h1>
        <h2 class="text-sm text-gray-500 mb-2">Deskripsi Singkat</h2>
        <p class="text-gray-600 text-sm w-70">{{ $kelas->deskripsi }}</p>
        <div class="button flex gap-2 justify-end  mt-3">
        <a href="{{ route('list-siswa',$kelas->id) }}" class="py-1 px-2 bg-blue-600 rounded-lg text-white font-semibold shadow-lg"><i class="bi bi-eye-fill"></i></a>
        <form action="/tambah-kelas/delete/{{ $kelas->id }}" method="POST" >
        @csrf
        @method("DELETE")
          <button type="submit" onclick="return confirm('Yakin Mau Di Hapus?')" class="py-1 px-2 bg-red-600 rounded-lg cursor-pointer text-white font-semibold shadow-lg"><i class="bi bi-trash-fill"></i></button>
        </form>
      </div>
      </div>
    </div>
  @endforeach
</div>
    </div>
    

@endsection