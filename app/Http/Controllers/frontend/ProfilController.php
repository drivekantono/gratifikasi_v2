<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profil;
use App\Lkjip;
use App\StrukturOrganisasi2;
use App\GaleriInspektorat;
use DB;

class ProfilController extends Controller
{
    public function index()
    {
        parent::trackers('profil');
        $items = Profil::where('title', 'TUGAS DAN FUNGSI')->first();
        $items1 = Profil::where('title', 'VISI DAN MISI')->first();
        $items2 = Profil::where('title', 'STRUKTUR ORGANISASI')->first();
        $items3 = Profil::where('title', 'TUJUAN')->first();
        $items4 = StrukturOrganisasi2::all();
        $items5 = GaleriInspektorat::all();
        $items6 = Profil::where('title', 'MAKLUMAT PELAYANAN')->first();
        
        return view('frontend.profil.index', compact('items','items1', 'items2', 'items3', 'items4', 'items5', 'items6'));
    }

    public function tugasDanFungsi()
    {
        $items = Profil::where('title', 'TUGAS DAN FUNGSI')->first();
        return view('frontend.profil.tugas_dan_fungsi', compact('items'));
    }

    public function sdm()
    {
        $items = Profil::where('title', 'SDM')->first();
        return view('frontend.profil.sdm', compact('items'));
    }

    public function strukturOrganisasi()
    {
        $items = Profil::where('title', 'STRUKTUR ORGANISASI')->first();
        return view('frontend.profil.struktur_organisasi', compact('items'));
    }

    public function kedudukanDanAlamat()
    {
        $items = Profil::where('title', 'KEDUDUKAN DAN ALAMAT')->first();
        return view('frontend.profil.kedudukan_dan_alamat', compact('items'));
    }


    public function lkjip()
    {

        $new = Lkjip::orderBy('tahun' , 'DESC')->first();

        if($new == null)
        {   
            $items = Lkjip::all();
            $data = DB::table('lkjips')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->get();
            
            return view('frontend.profil.lkjip',compact('items', 'data', 'new'));

        }else{

             $items = Lkjip::where('tahun', $new->tahun)->orderBy('created_at', 'DESC')->get();

             $data = DB::table('lkjips')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->get();
             return view('frontend.profil.lkjip',compact('items', 'data', 'new'));
        }
    }
    public function lkjipbytahun(Request $request)
    {

        $data = DB::table('lkjips')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->get();
                     
        $items = Lkjip::where('tahun', $request->tahun)->orderBy('created_at','DESC')->get();
        $new = $request;       

        return view('frontend.profil.lkjip',compact('items', 'data' , 'new'));
    }
}
