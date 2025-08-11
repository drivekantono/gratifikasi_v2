<?php

namespace App\Http\Controllers\ppid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PpidRegulasi;
use DB;

class RegulasiController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = PpidRegulasi::orderBy('id', 'ASC')->paginate($perPage);
        return view('ppid.regulasi.index', compact('items', 'perPage'));
    }
}
