<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\PelanggaranSiswa;

class KelasController extends Controller
{
    public function daftarKelas()
    {
        $ambilKelas = Kelas::get();
        return view('kelas', compact('ambilKelas'));
    }

    public function tes()
    {
        $daftarPel = DaftarPel::get();
        return view('pelanggaran.pelanggaran', ['listPel' => $daftarPel]);
    }

    public function tambahKelas()
    {
        return view('kelas.tambah-kelas');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|max:50',
            'poin' => 'required|max:200',
            'tingkat' => 'max:50',
            'foto' => 'image|mimes:jpg,jpeg,png'
        ], [
            'nama.required' => 'Harus Di Isi Nama Kelas Nya Oi!',
            'poin.required' => 'Harus Di Isi Deskripsi Nya Oi!',
        ]);

        $cihuy = null;
        if ($req->hasFile('foto') && $req->file('foto')->isValid()) {
            $cihuy = $req->file('foto')->store('foto', 'public');
        }

        Kelas::create([
            'nama_kelas' => $req->nama,
            'deskripsi'  => $req->poin,
            'images'       => $cihuy,
        ]);

        return redirect()->route('kelas')->with('ditambahkan', 'Kelas berhasil disimpan!');
    }

    public function destroy($id)
    {
        $user = Kelas::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('hapus', 'Kelas berhasil dihapus!');
    }

    public function listSiswa($id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswa = Siswa::where('kelas_id', $id)->get();
        return view('kelas.list-siswa', compact('kelas', 'siswa'));
    }

    public function tambahSiswa()
    {
        $kelas = Kelas::get();
        return view('kelas.tambah-siswa', compact('kelas'));
    }

    public function storeSiswa(Request $req)
    {
        $req->validate([
            'nama' => "required|max:50",
            'alamat' => "required|max:50",
            'nis' => "required|unique:siswa,nis",
            'poin' => "required|max:50",
            'kelas_id' => "required",
        ]);

        Siswa::create([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'nis' => $req->nis,
            'poin' => $req->poin,
            'kelas_id' => $req->kelas_id,
        ]);

        return redirect()->route('list-siswa', $req->kelas_id)->with('siswa_succes', 'Siswa berhasil disimpan!');
    }

    public function destroySiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas_id = $siswa->kelas_id;
        $siswa->delete();

        return redirect()->route('list-siswa', $kelas_id)->with('siswa_destroy', 'Siswa berhasil dihapus!');
    }

    public function formTambahPoin($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pelanggaran = DaftarPel::all();
        return view('kelas.tambah-poin', compact('siswa', 'pelanggaran'));
    }

    public function tambahPoin(Request $request, $id)
    {
        $request->validate([
            'pelanggaran_id' => 'required|exists:daftar_pelanggaran,id',
            'tanggal'        => 'required|date',
            'poin'           => 'required|numeric',
        ]);

        PelanggaranSiswa::create([
            'siswa_id'       => $id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'poin'           => $request->poin,
            'tanggal'        => $request->tanggal,
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->poin += $request->poin;
        $siswa->save();

        return redirect()->route('list-siswa', $siswa->kelas_id)
            ->with('success', 'Pelanggaran berhasil ditambahkan!');
    }

    public function riwayat()
    {
        $riwayat = PelanggaranSiswa::get();

        return view("kelas.riwayat", compact("riwayat"));
    }

    public function destroyRiwayat($id)
    {
        $user = PelanggaranSiswa::FindOrFail($id);
        $user->delete();

        return redirect()->route('riwayat')->with('riwayatSucces', 'Gacor Kingss Data Masuk');
    }

    public function updateSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view("kelas.update-siswa", compact("siswa"));
    }

    public function upsiswaStore(Request $req, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            "nama"   => $req->name,
            "nis"    => $req->nis,
            "alamat" => $req->email,
            "poin"   => $req->poin,
        ]);

        return redirect()->back()
            ->with('updates', 'Siswa berhasil diupdate!');
    }
}
