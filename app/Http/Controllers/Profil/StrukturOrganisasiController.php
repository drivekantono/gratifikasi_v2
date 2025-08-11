<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class StrukturOrganisasiController extends Controller
{
     public function edit()
    {
        $items = Profil::where('title', 'STRUKTUR ORGANISASI')->first();
        return view('admin.profil.edit', compact('items'));
    }
}