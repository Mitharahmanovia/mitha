<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'Biodata_1115';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'email',
        'no_hp',
        'alamat',
    ];
}
