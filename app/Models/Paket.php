<?php

namespace App\Models;
use App\Models\PaketGambar;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'pakets';

    protected $fillable = [
        'nama_paket',
        'harga',
        'deskripsi',
        'gambar'
    ];

    public function galeri()
    {
        return $this->hasMany(PaketGambar::class);
    }

}
