<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = false;

    protected $table = 'supplier';

    protected $fillable = ['nama_supplier', 'alamat', 'no_kontak', 'jenis_pasokan'];
}
