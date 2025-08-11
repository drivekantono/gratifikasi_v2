<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\ContactUs;
use App\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	$kontak = ContactUs::orderBy('id', 'DESC')->first();
    	view()->share(['kontak' => $kontak]);
    	
    }
    
    public function trackers($hal)
    {
    	$ip = $_SERVER['REMOTE_ADDR'];
        $deskripsi = "visitor";
        $halaman = $hal;

        $data = array(
            'ip' => $ip,
            'deskripsi' => $deskripsi,
            'halaman' => $halaman,
        );
            
        Log::create($data);
    }
}
