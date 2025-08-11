<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengaduanMasyarakatData;
use App\PengaduanMasyarakatLookup;
use App\PelaporanGratifikasiData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role === 'dumas') {
            //Rekapitulasi Bulanan
            $items_label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
            
            $tahun = Carbon::now()->isoFormat('YYYY');
            for ($idx = 1; $idx <= 12; $idx++) {
                $bulan = substr("00".$idx, -2);
                $filter = $tahun . '-' . $bulan;
                $items_pmd = PengaduanMasyarakatData::where('pmd_tanggal_terima', 'LIKE', '%'.$filter.'%')->count();
                $items_nilai[] = $items_pmd;
            }

            $filter = Carbon::now()->isoFormat('YYYY-MM');
            $items_pmd = PengaduanMasyarakatData::where('pmd_tanggal_terima', 'LIKE', '%'.$filter.'%')->get();

            //Rekapitulasi Bulan Berjalan Berdasarkan Kategori
            $items_aduan_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan kategori')->orderBy('pml_nilai', 'ASC')->get();

            foreach ($items_aduan_kategori as $item_aduan_kategori) {
                $items_label_kategori[] = $item_aduan_kategori->pml_nilai;
                $jumlah = 0;

                foreach ($items_pmd as $item_pmd) {
                    if ($item_pmd->pmd_kategori === $item_aduan_kategori->pml_nilai) {
                        $jumlah += 1;
                    }
                }
                $items_nilai_kategori[] = $jumlah;
            }

            //Rekapitulasi Bulan Berjalan Berdasarkan Status
            $items_aduan_status = PengaduanMasyarakatLookup::where('pml_kategori', 'proses selanjutnya')->orderBy('pml_catatan', 'ASC')->get();

            $items_label_status[] = 'Baru';

            foreach ($items_aduan_status as $item_aduan_status) {
                $find = 0;
                foreach ($items_label_status as $item_label_status) {
                    if ($item_label_status === $item_aduan_status->pml_catatan) {
                        $find = 1;
                    }
                }
                if ($find === 0) {
                    $items_label_status[] = $item_aduan_status->pml_catatan;
                }
            }

            foreach ($items_label_status as $item_label_status) {
                $jumlah = 0;

                foreach ($items_pmd as $item_pmd) {
                    if ($item_pmd->pmd_status === $item_label_status) {
                        $jumlah += 1;
                    }
                }
                $items_nilai_status[] = $jumlah;
            }

            return view('home', compact('items_pmd', 'items_label', 'items_nilai', 'items_label_kategori', 'items_nilai_kategori', 'items_label_status', 'items_nilai_status'));
        
        } else if (Auth::user()->role === 'gratifikasi') {
            $count_pgd_all = PelaporanGratifikasiData::count();
            $count_pgd_gratifikasi = PelaporanGratifikasiData::where('pgd_verifikasi', 'Lengkap')->count();
            $count_pgd_bukan_gratifikasi = PelaporanGratifikasiData::where('pgd_verifikasi', 'Belum Lengkap')->count();
            $count_pgd_belum_verifikasi = PelaporanGratifikasiData::where('pgd_verifikasi', 'Y')->orWhere('pgd_verifikasi', 'T')->orWhere('pgd_verifikasi', null)->count();

            $bulan_labels = [
                'Januari',
                'Februai',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];

            $idx_bulan = intval(Carbon::now()->isoFormat('MM'));
            for ($idx = 0; $idx <= $idx_bulan - 1; $idx++) {
                $items_label[] = $bulan_labels[$idx];
            }

            $tahun = Carbon::now()->isoFormat('YYYY');
            for ($idx = 1; $idx <= 12; $idx++) {
                $bulan = substr("00".$idx, -2);
                $filter = $tahun.'-' . $bulan. '-';
                $count_pgd = PelaporanGratifikasiData::where('pgd_tanggal_lapor','like','%'.$filter.'%')->count();
                $items_nilai[0][] = $count_pgd;
            }

            for ($idx = 1; $idx <= 12; $idx++) {
                $bulan = substr("00".$idx, -2);
                $filter = $tahun.'-' . $bulan. '-';
                $count_pgd = PelaporanGratifikasiData::where('pgd_verifikasi', 'Y')->where('pgd_tanggal_lapor','like','%'.$filter.'%')->count();
                $items_nilai[1][] = $count_pgd;
            }

            for ($idx = 1; $idx <= 12; $idx++) {
                $bulan = substr("00".$idx, -2);
                $filter = $tahun.'-' . $bulan. '-';
                $count_pgd = PelaporanGratifikasiData::where('pgd_verifikasi', 'T')->where('pgd_tanggal_lapor','like','%'.$filter.'%')->count();
                $items_nilai[2][] = $count_pgd;
            }

            for ($idx = 1; $idx <= 12; $idx++) {
                $bulan = substr("00".$idx, -2);
                $filter = $tahun.'-' . $bulan. '-';
                $count_pgd = PelaporanGratifikasiData::where('pgd_verifikasi', null)->where('pgd_tanggal_lapor','like','%'.$filter.'%')->count();
                $items_nilai[3][] = $count_pgd;
            }

            return view('home', compact('items_label', 'items_nilai', 'count_pgd_all', 'count_pgd_gratifikasi', 'count_pgd_bukan_gratifikasi', 'count_pgd_belum_verifikasi'));
        } else {
            $items_label = [];
            $items_nilai[0] = [];
            $items_nilai[1] = [];
            $items_nilai[2] = [];
            $items_nilai[3] = [];
            return view('home', compact('items_label', 'items_nilai'));
        }
        
    }
}
