<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function regisSubmit(Request $req)
    {
        $req->validate([
            'username' => 'min:5|unique:users,name',
            'password' => 'min:5',
            'mail' => 'email|min:5|unique:users,email',
        ], [
            'username.min' => 'Minimal 5 Char Woi',
            'username.unique' => 'Nama Udah Ada',
            'password.min' => 'Minimal 5 Char Woi',
            'mail.min' => 'Minimal 5 Char Woi',
            'mail.email' => 'Masukin Email Yang Bener',
            'mail.unique' => 'Email Udah Ada',
        ]);

        User::create([
            'name' => $req->username,
            'email' => $req->mail,
            'password' => bcrypt($req->password),
        ]);

        return redirect('/login');
    }

    public function kepalapentil()
    {
        return view('login');
    }

    public function loginSubmit(Request $req)
    {
        $data = User::where('name', $req->username)->first();

        $req->validate([
            'username' => 'required',
            'password' => 'required|min:5',
        ], [
            'username.required' => 'Isi Dulu Woi!',
            'password.required' => 'Isi Dulu Woi!',
            'password.min' => 'Minimal 5 karakter!',
            'username.min' => 'Minimal 5 karakter!',
        ]);

        if (!$data) {
            return back()->withErrors(['login' => 'Username tidak ditemukan.']);
        }

        if (Auth::attempt(['name' => $req->username, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect()->route('dashboard')->with('succes', 'Hola');
        }
    }

    public function keluar()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
