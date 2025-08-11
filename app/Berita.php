<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $guarded = [];

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori');
    }
}
