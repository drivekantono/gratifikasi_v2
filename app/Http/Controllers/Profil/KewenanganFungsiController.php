<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class KewenanganFungsiController extends Controller
{
   
    public function edit()
    {
        $items = Profil::where('title', 'TUGAS DAN FUNGSI')->first();
        return view('admin.profil.edit', compact('items'));
    }

}
