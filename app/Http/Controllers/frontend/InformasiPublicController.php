<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PeraturanPerundangan;
use App\HutanRakyat;
use App\LinkLayanan;
use App\DownloadMateri;
use App\ObjekWisataAlam;
use App\Sakip;
use App\DataStatistika;
use App\PengaduanMasyarakat;
use App\PengaduanMasyarakatLookup;
use App\PengaduanMasyarakatData;
use App\PelaporanGratifikasiData;
use App\PelaporanGratifikasiLookup;

class InformasiPublicController extends Controller
{
    public function pengaduanMasyarakat()
    {
        parent::trackers('pengaduan masyarakat');
    	$items = PengaduanMasyarakat::first();
        $items_aduan_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan kategori')->orderBy('pml_nilai', 'ASC')->get();
        $items_pesan = [
            'jenis' => '',
            'text'  => ''
        ];
        // dd($items->tata_cara);
    	return view('frontend.informasi_public.pengaduan_masyarakat', compact('items', 'items_aduan_kategori', 'items_pesan'));
    }

    public function pelaporanGratifikasi()
    {
        $items_pesan = [
            'jenis' => '',
            'text'  => ''
        ];
        $items_pgd = PelaporanGratifikasiData::orderBy('created_at', 'ASC')->get();
        $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_lokasi_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'lokasi','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_jenis_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_faq = PelaporanGratifikasiLookup::where(['pgl_sub'=>'FAQ','pgl_status'=>'A'])->orderBy('pgl_kategori', 'ASC')->get();
        return view('frontend.informasi_public.pelaporan_gratifikasi', compact('items_pgd', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_lokasi_objek', 'items_data_jenis_objek', 'items_pesan', 'items_faq'));
    }
    
    //tambah ARIC 11-09-2024
    public function wbs()
    {
        parent::trackers('pengaduan masyarakat');
    	$items = PengaduanMasyarakat::first();
        $items_aduan_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan kategori')->orderBy('pml_nilai', 'ASC')->get();
        $items_pesan = [
            'jenis' => '',
            'text'  => ''
        ];
        // dd($items->tata_cara);
    	return view('frontend.informasi_public.wbs', compact('items', 'items_aduan_kategori', 'items_pesan'));
    }

    public function peraturanPerundangan()
    {
        parent::trackers('peraturan perundangan');
    	$perPage = 10;
        $items = PeraturanPerundangan::orderBy('created_at', 'DESC')->paginate($perPage);
    	return view('frontend.informasi_public.peraturan_perundangan', compact('items', 'perPage'));
    }

    public function dataSPasialKehutanan()
    {
        parent::trackers('data spasial kehutanan');
    	$items = HutanRakyat::orderBy('created_at', 'DESC')->first();
    	return view('frontend.informasi_public.data_spasial_kehutanan', compact('items'));
    }

    public function linkLayanan()
    {
        parent::trackers('link layanan');
        $perPage = 5;
        $items = LinkLayanan::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('frontend.informasi_public.link_layanan', compact('items', 'perPage'));
    }

    public function objekWisataAlam()
    {
        parent::trackers('objek wisata alam');
        $perPage = 4;
        $items = ObjekWisataAlam::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('frontend.informasi_public.objek_wisata_alam', compact('items', 'perPage'));
    }
    public function objekWisataAlamShow($id)
    {
        $items = ObjekWisataAlam::findOrFail($id);
        return view('frontend.informasi_public.objek_wisata_alam_show',compact('items'));
    }

    public function downloadMateri()
    {
        parent::trackers('download materi');
        $perPage = 5;
        $items = DownloadMateri::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('frontend.informasi_public.download_materi', compact('items', 'perPage'));
    }

    public function sakip()
    {
        parent::trackers('sakip');
        $items = Sakip::all();
        foreach ($items as $key => $th) {
            $data[$key] = array(
                'tahun' => $th->tahun,
            );
        }
        return view('frontend.informasi_public.sakip', compact('items', 'data'));
    }

    public function sakipbytahun(Request $request)
    {
        
        $items1 = Sakip::all();
        foreach ($items1 as $key => $th) {
            $data[$key] = array(
                'tahun' => $th->tahun,
            );
        }

        $items = Sakip::orderBy('created_at', 'DESC')->where('tahun', $request->tahun)->get();
        
        return view('frontend.informasi_public.sakip', compact('items', 'data'));
    }

    public function kehutananDalamAngka()
    {
        parent::trackers('kehutanan dalam angka');
        $items = DataStatistika::all();

        foreach ($items as $key => $th) {
            $data[$key] = array(
                'tahun' => $th->tahun,
            );
        }        
        return view('frontend.informasi_public.kehutanan_dalam_angka',compact('items', 'data'));
    }

    public function kehutananDalamAngkabytahun(Request $request)
    {
        $items1 = DataStatistika::all();

        foreach ($items1 as $key => $th) {
            $data[$key] = array(
                'tahun' => $th->tahun,
            );
        } 

        $items = DataStatistika::orderBy('created_at','DESC')->where('tahun', $request->tahun)->get();       
        return view('frontend.informasi_public.kehutanan_dalam_angka',compact('items', 'data'));
    }
    
//tambah kadek 19-03-2024
   public function evakuasi()
    {
      return view('frontend.informasi_public.evakuasi');
    }
}
