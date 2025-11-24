<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPel extends Model
{
    protected $table = 'daftar_pelanggaran';
    protected $guarded = ['id'];

    public function pelanggaranSiswa()
    {
        return $this->hasMany(PelanggaranSiswa::class, 'pelanggaran_id');
    }
}
