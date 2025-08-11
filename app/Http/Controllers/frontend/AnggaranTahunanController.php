<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AnggaranTahunan;
use DB;

class AnggaranTahunanController extends Controller
{
    public function index()
    {
        $new = AnggaranTahunan::orderBy('tahun' , 'DESC')->first();
    

        if($new == null)
        {   
            $items = AnggaranTahunan::all();
            $data = DB::table('anggaran_tahunans')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->orderBy('tahun','DESC')
                     ->get();
      
            return view('frontend.anggaran_tahunan.index',compact('items', 'data', 'new'));
        }else{
             $items = AnggaranTahunan::where('tahun', $new->tahun)->orderBy('created_at', 'DESC')->get();
             $data = DB::table('anggaran_tahunans')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->orderBy('tahun','DESC')
                     ->get();
             return view('frontend.anggaran_tahunan.index',compact('items', 'data', 'new'));
        }
    }

    public function bytahun(Request $request)
    {
        $data = DB::table('anggaran_tahunans')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->orderBy('tahun','DESC')
                     ->get();
                     
        $items = AnggaranTahunan::where('tahun', $request->periode)->orderBy('created_at','DESC')->get();
        $new = $request;  
         
        return view('frontend.anggaran_tahunan.index',compact('items', 'data' , 'new'));
    }
}



   // $items = AnggaranTahunan::orderBy('created_at','DESC')->where('tahun', $request->periode)->get();        
        // $tahun = AnggaranTahunan::all();
        // foreach($tahun as $key => $tah){
        //         $data2[$key] =  $tah->tahun;
        // }
        
        // $data = array_unique($data2);
        // return view('frontend.anggaran_tahunan.index', compact('items','data'));

