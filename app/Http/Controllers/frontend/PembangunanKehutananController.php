<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PembangunanHutan;
use App\RenstraStrategis;
use App\RencanaKerja;
use DB;
class PembangunanKehutananController extends Controller
{
    public function nbs()
    {
        parent::trackers('nawa bhakti satya');
        $items = PembangunanHutan::where('title','NAWA BHAKTI SATYA')->first();
        return view('frontend.pembangunan_kehutanan.nbs', compact('items'));
    }

    public function renstraStrategis()
    {   
        parent::trackers('renstra strategis');
        $tahun = RenstraStrategis::all();
        if(count($tahun) < 1){
            $data = null;
            $items = RenstraStrategis::orderBy('tahun2','DESC')->get(); 
            return view('frontend.pembangunan_kehutanan.renstra_strategis', compact('items', 'data'));
        }else{

            $temp = RenstraStrategis::orderBy('tahun2', 'DESC')
                                    ->first();
            $new = $temp->tahun1."-".$temp->tahun2;
            $data = DB::table('renstra_strategis')
                     ->select(DB::raw('tahun1,tahun2'))
                     ->groupBy('tahun1','tahun2')
                     ->get();
            
            $items = RenstraStrategis::where('tahun1', $temp->tahun1)
                                        ->where('tahun2', $temp->tahun2)
                                        ->orderBy('tahun2','DESC')->get(); 
            return view('frontend.pembangunan_kehutanan.renstra_strategis', compact('items', 'data', 'new'));
        }
    }

    public function bytahun(Request $request)
    {
        if($request->periode === "datakosong"){
            $data = null;
            $items = RenstraStrategis::orderBy('tahun2','DESC')->get(); 
            return view('frontend.pembangunan_kehutanan.renstra_strategis', compact('items', 'data'));
       }else{
           $new = $request->periode;

           $tahun = $request->periode;
           $pertahun = explode('-', $tahun);
           $items = RenstraStrategis::orderBy('tahun2', 'DESC')
                                    ->where('tahun1', $pertahun[0])
                                    ->where('tahun2', $pertahun[1])
                                    ->get();

           $data = DB::table('renstra_strategis')
                     ->select(DB::raw('tahun1,tahun2'))
                     ->groupBy('tahun1','tahun2')
                     ->get();

            return view('frontend.pembangunan_kehutanan.renstra_strategis', compact('items','data', 'new')); 
       }
    }

    public function rencanaKerja()
    {
        parent::trackers('rencana kerja');
        $new = RencanaKerja::orderBy('tahun' , 'DESC')->first();

        if($new == null)
        {   
            $items = RencanaKerja::all();
            $data = DB::table('rencana_kerjas')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->get();
            
            return view('frontend.pembangunan_kehutanan.rencana_kerja',compact('items', 'data', 'new'));

        }else{

             $items = RencanaKerja::where('tahun', $new->tahun)->orderBy('created_at', 'DESC')->get();
             $data = DB::table('rencana_kerjas')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->get();
             return view('frontend.pembangunan_kehutanan.rencana_kerja',compact('items', 'data', 'new'));
        }
    }

    public function RenKerbytahun(Request $request)
    {
        
        $data = DB::table('rencana_kerjas')
                     ->select(DB::raw('tahun'))
                     ->groupBy('tahun')
                     ->get();
                     
        $items = RencanaKerja::where('tahun', $request->tahun)->orderBy('created_at','DESC')->get();
        $new = $request;       
        return view('frontend.pembangunan_kehutanan.rencana_kerja',compact('items', 'data' , 'new'));
    }


}
