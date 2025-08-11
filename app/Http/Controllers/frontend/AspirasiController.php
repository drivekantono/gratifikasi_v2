<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aspirasi;
class AspirasiController extends Controller
{
    public function index()
    {
        $perPage = 6;
        $items = Aspirasi::orderBy('id', 'ASC')
        ->where('publikasi', 1)
        ->paginate($perPage);
        return view('frontend.aspirasi.list', compact('items', 'perPage'));
    }
    
    public function store(Request $request)
    {
    	Aspirasi::create($request->all());
    	return redirect()->route('frontend.berita.index')->withSuccess('Terima Kasih Atas Aspirasi Anda!');
    }
}
