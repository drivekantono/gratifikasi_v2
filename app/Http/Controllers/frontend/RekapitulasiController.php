<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rekapitulasi;

class RekapitulasiController extends Controller
{
    public function index()
    {
    	$perPage = 9;
    	$items = Rekapitulasi::orderBy('created_at', 'DESC')->paginate($perPage);
    	return view('frontend.rekapitulasi.index', compact('items', 'perPage'));
    }
}
