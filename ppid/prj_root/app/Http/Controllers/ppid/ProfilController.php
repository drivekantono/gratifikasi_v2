<?php

namespace App\Http\Controllers\ppid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PpidProfil;
use DB;

class ProfilController extends Controller
{
    public function index()
    {
        $items = PpidProfil::orderBy('id', 'ASC')->get();
        return view('ppid.profil.index', compact('items'));
    }

    public function visi_misi_ppid()
    {
        parent::trackers('profil');
		$item_profil_singkat = PpidProfil::where('title', 'PROFIL SINGKAT')->first();
		$item_visi_misi = PpidProfil::where('title', 'VISI DAN MISI')->first();
		$item_struktur_organisasi = PpidProfil::where('title', 'STRUKTUR ORGANISASI')->first();
		$item_tugas_kewenangan = PpidProfil::where('title', 'TUGAS DAN KEWENANGAN')->first();
		$item_maklumat = PpidProfil::where('title', 'MAKLUMAT PELAYANAN')->first();
        
        return view('ppid.profil.index', compact('item_profil_singkat', 'item_visi_misi', 'item_struktur_organisasi', 'item_tugas_kewenangan','item_maklumat'));
    }
}
