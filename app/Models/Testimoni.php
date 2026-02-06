<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';

    protected $fillable = [
        'user_id',
        'nama',
        'isi',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
