<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelanggaran extends Model
{
    protected $table = 'daftar_pels';

    protected $primaryKey = 'id';

    protected $guarded = ['id_siswa']; // yang tidakk boleh di input


}
