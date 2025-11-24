<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'id';

    protected $guarded = ['id']; // yang tidakk boleh di input
    public function pelanggaran()
    {
        return $this->hasMany(PelanggaranSiswa::class);
    }
}
