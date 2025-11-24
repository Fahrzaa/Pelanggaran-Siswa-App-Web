<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id';

    protected $guarded = ['id']; // yang tidakk boleh di input
}
