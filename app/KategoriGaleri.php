<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    protected $table = 'kategori_galeris';
    protected $guarded = [];

    public function galeri()
    {
        return $this->hasMany(Galeri::class)->withDefault();
    }
}
