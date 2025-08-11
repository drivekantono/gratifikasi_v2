<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class ProfilKepalaDinasController extends Controller
{
    public function edit()
    {
        $items = Profil::where('title', 'PROFIL KEPALA DINAS')->first();
        return view('admin.profil.edit', compact('items'));
    }
}
