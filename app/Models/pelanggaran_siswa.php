<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\siswa;

class pelanggaran_siswa extends Model
{
    protected $table = 'pelanggaran_siswa';
    protected $fillable = ['siswa_id', 'keterangan', 'poin'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
