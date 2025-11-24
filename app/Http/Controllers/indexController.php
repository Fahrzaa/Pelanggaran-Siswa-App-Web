<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\Kelas;
use App\Models\PelanggaranSiswa;
use App\Models\User;

class indexController extends Controller
{
   public function dashboard()
   {
      $kelas = Kelas::count();
      $siswa = siswa::count();
      $riwayats = PelanggaranSiswa::count();
      $riwayat = PelanggaranSiswa::get();
      $user = User::get();
      return view('dashboard', compact('kelas', 'siswa', "riwayats", 'riwayat', "user"));
   }
   public function login()
   {
      return view('login');
   }
   public function regis()
   {
      return view('regis');
   }
   public function index()
   {
      return view('index');
   }
   public function list()
   {
      return view('list');
   }
}
