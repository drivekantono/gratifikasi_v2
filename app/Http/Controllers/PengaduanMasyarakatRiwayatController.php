<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PengaduanMasyarakatData;
use App\PengaduanMasyarakatRiwayat;
use App\PengaduanMasyarakatLookup;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengaduanMasyarakatRiwayatController extends Controller
{
    public function index()
    {
        //
    }

    public function show($pmd_id)
    {
        //
    }

    public function create($pmd_id)
    {
        $items_pmd = PengaduanMasyarakatData::where('id', $pmd_id)->first();
        $items_pmr = PengaduanMasyarakatRiwayat::where('pmd_id', $pmd_id)->count();
        $items_proses_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'proses kategori')->orderBy('pml_nilai', 'ASC')->get();
        $items_proses_oleh = PengaduanMasyarakatLookup::where('pml_kategori', 'proses oleh')->orderBy('pml_nilai', 'ASC')->get();
        $items_proses_selanjutnya = PengaduanMasyarakatLookup::where('pml_kategori', 'proses selanjutnya')->orderBy('pml_nilai', 'ASC')->get();

        $gets_pmr_no = $items_pmr + 1;
        $gets_pmr_no = $items_pmd->id . '-' . $gets_pmr_no;

        $gets_pmr_tanggal = Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD');

        return view('admin.pengaduan_masyarakat_riwayat.create', compact('items_pmd', 'items_proses_kategori', 'items_proses_oleh', 'items_proses_selanjutnya', 'gets_pmr_no', 'gets_pmr_tanggal'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'pmd_id'          => 'required',
            'pmd_no'          => 'required',
            'pmr_no'          => 'required',
            'pmr_tanggal'     => 'required',
            'pmr_kategori'    => 'required',
            'pmr_oleh'        => 'required',
            'pmr_judul'       => 'required',
            'pmr_isi'         => 'required',
            'pmr_selanjutnya' => 'required',
            'pmr_lampiran'    => 'mimes:jpg,png,jpeg,pdf|max:10240'
        ]);

        if ($request->hasFile('pmr_lampiran')) {
            $pmr_lampiran = $request->file('pmr_lampiran');
            $pmr_lampiran_name = $request->pmr_no . '-' . rand() . '.' . $pmr_lampiran->getClientOriginalExtension();
            $pmr_lampiran->move(public_path('uploads/pengaduan_masyarakat'), $pmr_lampiran_name);
        }else{
            $pmr_lampiran_name = null;
        }

        $data = array(
            'pmd_id'                 => $request->pmd_id,
            'pmd_no'                 => $request->pmd_no,
            'pmr_no'                 => $request->pmr_no,
            'pmr_tanggal'            => $request->pmr_tanggal,
            'pmr_kategori'           => $request->pmr_kategori,
            'pmr_oleh'               => $request->pmr_oleh,
            'pmr_judul'              => $request->pmr_judul,
            'pmr_isi'                => $request->pmr_isi,
            'pmr_lampiran'           => $pmr_lampiran_name,
            'pmr_selanjutnya'        => $request->pmr_selanjutnya,
            'created_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'created_at'             => Carbon::now('Asia/Jakarta'),
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        );

        PengaduanMasyarakatRiwayat::create($data);
        $message = 'Berhasil menambahkan progress Pengaduan Masyarakat!';

        $items_proses_selanjutnya = PengaduanMasyarakatLookup::where('pml_kategori', 'proses selanjutnya')->where('pml_nilai', $request->pmr_selanjutnya)->first();

        $items = PengaduanMasyarakatData::where('id', $request->pmd_id)->first();
        $items->update(['pmd_status' => $items_proses_selanjutnya->pml_catatan]);
        return redirect()->route('admin.pengaduan_masyarakat_data.show', compact('items', 'message'));
    }
}
