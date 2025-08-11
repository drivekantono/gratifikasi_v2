<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $table = 'kategori_beritas';
    protected $guarded = [];

    public function berita()
    {
        return $this->hasMany(Berita::class)->withDefault();
    }
}
