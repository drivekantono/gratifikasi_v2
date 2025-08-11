<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class SekretariatBidangController extends Controller
{
    
    public function edit()
    {
        $items = Profil::where('title', 'SEKRETARIAT DAN BIDANG')->first();
        return view('admin.profil.edit', compact('items'));
    }
  
}
