<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class SdmController extends Controller
{
    public function edit()
    {
        $items = Profil::where('title', 'SDM')->first();
        return view('admin.profil.edit', compact('items'));
    }
}
