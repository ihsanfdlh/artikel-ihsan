<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $primaryKey = 'id_komentar';

    protected $fillable = [
        'user_id',
        'artikel_id',
        'isi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
