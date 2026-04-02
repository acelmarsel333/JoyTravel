<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketGambar extends Model
{
    protected $table = 'paket_gambar';

    protected $fillable = [
        'paket_id',
        'gambar',
        'map_embed'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
