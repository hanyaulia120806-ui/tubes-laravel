<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'level_member',
        'dibuat_pada'
    ];
}