<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daftarPel;

class pelController extends Controller
{
    public function tambahPel()
    {
        return view('pelanggaran.tambah');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|max:50',
            'poin' => 'required|max:50',
            'kategori' => 'required',
            'deskripsi' => 'required|max:50',
        ], [
            'nama.required' => 'Harus Di Isi Nama Pel Nya Oi!',
            'poin.required' => 'Harus Di Isi Poin Nya Oi!',
            'kategori.required' => 'Harus Di Isi Tingkat Nya Oi!',
            'deskripsi.required' => 'Harus Di Isi Tingkat Nya Oi!',
        ]);

        daftarPel::create([
            'nama_pelanggaran' => $req->nama,
            'poin' => $req->poin,
            'deskripsi' => $req->deskripsi,
            'kategori' => $req->kategori,
        ]);
        return redirect()->route('pelanggaran')->with('ditambahkan', 'Data berhasil disimpan!');
    }

    public function editPel($id)
    {
        $pelanggaran = daftarPel::findOrFail($id);
        return view('pelanggaran.edit');
    }


    public function destroy($id)
    {
        $user = daftarPel::FindOrFail($id);
        $user->delete();
        return redirect()->back()->with('hapus', 'Data berhasil dihapus!');
    }
}
