<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $timestamps = false;

    protected $table = 'staff';

    protected $fillable = ['nama', 'jabatan', 'no_kontak', 'tanggal_bergabung'];
}
