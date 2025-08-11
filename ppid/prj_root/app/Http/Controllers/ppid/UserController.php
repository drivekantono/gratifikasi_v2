<?php

namespace App\Http\Controllers\ppid;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\PpidPermohonanInformasi;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
       	//
    }
	
	public function dashboard()
    {
		$perPage = 3;
		$items = PpidPermohonanInformasi::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate($perPage);
        return view('ppid.user.dashboard', compact('items', 'perPage'));
    }
	
	public function informasi_akun()
    {
        return view('ppid.user.informasi_akun');
    }
	
	public function informasi_akun_ubah()
    {
        return view('ppid.user.informasi_akun_ubah');
    }
	
}
