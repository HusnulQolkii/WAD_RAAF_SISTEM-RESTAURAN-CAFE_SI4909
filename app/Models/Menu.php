<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    protected $fillable = [
        'category_id',
        'nama_menu',
        'deskripsi',
        'harga',
        'status_halal',
        'informasi_alergen',
        'foto',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
            'status_halal' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}