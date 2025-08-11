<?php

namespace App\Http\Controllers\ppid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PpidAlur;
use DB;

class AlurController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = PpidAlur::orderBy('id', 'ASC')->paginate($perPage);
        return view('ppid.alur.index', compact('items', 'perPage'));
    }
}
