<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function index()
    {
    	$items = Log::groupBy('halaman')->select('halaman', \DB::raw('count(*) as total'))->get();
       return view('admin.log.index', compact('items'));
    }

    public function filter($filter)
    {
    	$perPage = 10;
    	$items = Log::orderBy('id', 'DESC')
    					->where('halaman', $filter)
    					->paginate($perPage);
    	return view('admin.log.filter', compact('items', 'perPage'));
    }
}
