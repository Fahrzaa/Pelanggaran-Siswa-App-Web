<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SetController extends Controller
{
    public function pengaturan()
    {
        $siswa = Siswa::all();
        return view('pengaturan.pengaturan', compact("siswa"));
    }

    public function pengaturanUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto', 'public');
            $data['profile_picture'] = $path;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update langsung tanpa save()
        User::where('id', Auth::id())->update($data);

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
