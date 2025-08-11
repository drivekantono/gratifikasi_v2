<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;

class KedudukanAlamatController extends Controller
{
    public function edit()
    {
        $items = Profil::where('title', 'KEDUDUKAN DAN ALAMAT')->first();
        return view('admin.profil.edit', compact('items'));
    }
}
