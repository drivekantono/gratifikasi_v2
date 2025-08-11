<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    protected $guarded = [];

     public function kategoriGaleri()
    {
        return $this->belongsTo(KategoriGaleri::class, 'id_kategori');
    }
}
