<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PengaduanMasyarakat;
use App\PengaduanMasyarakatData;
use App\PengaduanMasyarakatRiwayat;
use App\PengaduanMasyarakatLookup;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengaduanMasyarakatDataController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = PengaduanMasyarakatData::orderBy('pmd_tanggal_terima', 'DESC')->get();
        $items_mobile = PengaduanMasyarakatData::orderBy('pmd_tanggal_terima', 'DESC')->paginate($perPage);
        return view('admin.pengaduan_masyarakat_data.index', compact('items', 'items_mobile', 'perPage'));
    }

    public function popup($pmd_terlapor_nama)
    {
        $perPage = 5;
        $items = PengaduanMasyarakatData::where('pmd_terlapor_nama', 'LIKE', '%'.$pmd_terlapor_nama.'%')->orderBy('created_at', 'DESC')->paginate($perPage);
        return view('admin.pengaduan_masyarakat_data.popup', compact('items', 'perPage'));
    }

    public function show($id)
    {
        $items = PengaduanMasyarakatData::findOrFail($id);
        $items_pmr = PengaduanMasyarakatRiwayat::where('pmd_id', $id)->orderBy('pmr_no', 'ASC')->get();
        $message = '';
        //return response()->json($items);
        return view('admin.pengaduan_masyarakat_data.show', compact('items', 'items_pmr', 'message'));
    }

    public function create()
    {
        $items_aduan_sumber = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan sumber')->orderBy('pml_nilai', 'ASC')->get();
        $items_aduan_sifat = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan sifat')->orderBy('pml_nilai', 'ASC')->get();
        $items_aduan_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan kategori')->orderBy('pml_nilai', 'ASC')->get();
        $items_pmd_filter = PengaduanMasyarakatData::get(['pmd_no', 'pmd_terlapor_nama']);
        $perPage = 10;
        $items = PengaduanMasyarakatLookup::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('admin.pengaduan_masyarakat_data.create', compact('items_aduan_sumber', 'items_aduan_sifat', 'items_aduan_kategori', 'items', 'perPage', 'items_pmd_filter'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'pmd_sumber'             => 'required',
            'pmd_sifat'              => 'required',
            'pmd_tanggal'            => 'required',
            'pmd_tanggal_terima'     => 'required',
            'pmd_pelapor_nama'       => 'required',
            'pmd_terlapor_nama'      => 'required',
            'pmd_terlapor_pekerjaan' => 'required',
            'pmd_kategori'           => 'required',
            'pmd_judul'              => 'required',
            'pmd_isi'                => 'required',
            'pmd_harapan'            => 'required',
            'pmd_lampiran_identitas' => 'mimes:jpg,png,jpeg,pdf|max:2048',
            'pmd_lampiran_01'        => 'mimes:jpg,png,jpeg,pdf|max:10240',
            'pmd_lampiran_02'        => 'mimes:jpg,png,jpeg,pdf|max:10240'
        ]);

        if ($request->pmd_sumber !== "Surat" && ($request->pmd_no === null || $request->pmd_no === "")) {
            $items = PengaduanMasyarakatData::where('pmd_tanggal_terima', 'LIKE', Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM').'%')->count();

            $gets_index = $items + 1;
            $gets_index = substr("000".$gets_index, -3);
            $gets_pmd_no = "PM".Carbon::now('Asia/Jakarta')->isoFormat('YYMMDDHHmm').$gets_index;
        } else {
            $gets_pmd_no = $request->pmd_no;
        }

        if ($request->hasFile('pmd_lampiran_identitas')) {
            $pmd_lampiran_identitas = $request->file('pmd_lampiran_identitas');
            $pmd_lampiran_identitas_name = '-lamp id-' . rand() . '.' . $pmd_lampiran_identitas->getClientOriginalExtension();
            $pmd_lampiran_identitas->move(public_path('uploads/pengaduan_masyarakat'), $pmd_lampiran_identitas_name);
        }else{
            $pmd_lampiran_identitas_name = null;
        }

        if ($request->hasFile('pmd_lampiran_01')) {
            $pmd_lampiran_01 = $request->file('pmd_lampiran_01');
            $pmd_lampiran_01_name = '-lamp 01-' . rand() . '.' . $pmd_lampiran_01->getClientOriginalExtension();
            $pmd_lampiran_01->move(public_path('uploads/pengaduan_masyarakat'), $pmd_lampiran_01_name);
        }else{
            $pmd_lampiran_01_name = null;
        }

        if ($request->hasFile('pmd_lampiran_02')) {
            $pmd_lampiran_02 = $request->file('pmd_lampiran_02');
            $pmd_lampiran_02_name = '-lamp 02-' . rand() . '.' . $pmd_lampiran_02->getClientOriginalExtension();
            $pmd_lampiran_02->move(public_path('uploads/pengaduan_masyarakat'), $pmd_lampiran_02_name);
        }else{
            $pmd_lampiran_02_name = null;
        }

        $gets_pmd_status = "Baru";

        if ($request->pmd_sumber === 'Website') {
            $gets_user = "web user";
        } else {
            $gets_user = Auth::user()->id . " | " . Auth::user()->name;
        }

        $data = array(
            'pmd_sumber'             => $request->pmd_sumber,
            'pmd_sifat'              => $request->pmd_sifat,
            'pmd_no'                 => $gets_pmd_no,
            'pmd_tanggal'            => $request->pmd_tanggal,
            'pmd_tanggal_terima'     => $request->pmd_tanggal_terima,
            'pmd_pelapor_nama'       => $request->pmd_pelapor_nama,
            'pmd_pelapor_pekerjaan'  => $request->pmd_pelapor_pekerjaan,
            'pmd_pelapor_telepon'    => $request->pmd_pelapor_telepon,
            'pmd_pelapor_email'      => $request->pmd_pelapor_email,
            'pmd_pelapor_alamat'     => $request->pmd_pelapor_alamat,
            'pmd_terlapor_nama'      => $request->pmd_terlapor_nama,
            'pmd_terlapor_pekerjaan' => $request->pmd_terlapor_pekerjaan,
            'pmd_terlapor_instansi'  => $request->pmd_terlapor_instansi,
            'pmd_terlapor_alamat'    => $request->pmd_terlapor_alamat,
            'pmd_kategori'           => $request->pmd_kategori,
            'pmd_judul'              => $request->pmd_judul,
            'pmd_isi'                => $request->pmd_isi,
            'pmd_harapan'            => $request->pmd_harapan,
            'pmd_catatan'            => $request->pmd_catatan,
            'pmd_lampiran_identitas' => $pmd_lampiran_identitas_name,
            'pmd_lampiran_01'        => $pmd_lampiran_01_name,
            'pmd_lampiran_02'        => $pmd_lampiran_02_name,
            'pmd_status'             => $gets_pmd_status,
            'created_by'             => $gets_user,
            'created_at'             => Carbon::now('Asia/Jakarta'),
            'updated_by'             => $gets_user,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        );

        PengaduanMasyarakatData::create($data);

        if ($request->pmd_sumber === 'Website') {
            $items = PengaduanMasyarakat::first();
            $items_aduan_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan kategori')->orderBy('pml_nilai', 'ASC')->get();
            $items_pesan = [
                'jenis' => 'success',
                'text'  => 'Terima kasih. Aduan Anda telah masuk di Inspektorat Provinsi Jawa Timur dan akan segera diproses.'
            ];
            return view('frontend.informasi_public.pengaduan_masyarakat', compact('items', 'items_aduan_kategori', 'items_pesan'));
        } else {
            return redirect()->route('admin.pengaduan_masyarakat_data.index')->withSuccess('Berhasil menambahkan data Pengaduan Masyarakat!');
        }
    }

    public function destroy($id)
    {
        $items_pmd = PengaduanMasyarakatData::findOrFail($id);
        $items_pmd->delete();

        $items_pmr = PengaduanMasyarakatRiwayat::where('pmd_id', $id)->delete();
        return redirect()->route('admin.pengaduan_masyarakat_data.index');
    }

    public function edit($id)
    {
        $items = PengaduanMasyarakatData::findOrFail($id);
        $items_aduan_sumber = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan sumber')->orderBy('pml_nilai', 'ASC')->get();
        $items_aduan_sifat = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan sifat')->orderBy('pml_nilai', 'ASC')->get();
        $items_aduan_kategori = PengaduanMasyarakatLookup::where('pml_kategori', 'aduan kategori')->orderBy('pml_nilai', 'ASC')->get();
        $items_pmd_filter = PengaduanMasyarakatData::get(['pmd_no', 'pmd_terlapor_nama']);
        return view('admin.pengaduan_masyarakat_data.edit', compact('items', 'items_aduan_sumber', 'items_aduan_sifat', 'items_aduan_kategori', 'items_pmd_filter'));
    }

    public function update(Request $request, $id)
    {
        // 
        $request->validate([
            'pmd_sumber'             => 'required',
            'pmd_sifat'              => 'required',
            'pmd_tanggal'            => 'required',
            'pmd_tanggal_terima'     => 'required',
            'pmd_pelapor_nama'       => 'required',
            'pmd_terlapor_nama'      => 'required',
            'pmd_terlapor_pekerjaan' => 'required',
            'pmd_kategori'           => 'required',
            'pmd_judul'              => 'required',
            'pmd_isi'                => 'required',
            'pmd_harapan'            => 'required',
            'pmd_lampiran_identitas' => 'mimes:jpg,png,jpeg,pdf|max:2048',
            'pmd_lampiran_01'        => 'mimes:jpg,png,jpeg,pdf|max:10240',
            'pmd_lampiran_02'        => 'mimes:jpg,png,jpeg,pdf|max:10240' 
        ]);

        $items = PengaduanMasyarakatData::findOrFail($id);

        $pmd_lampiran_identitas_old = $items->pmd_lampiran_identitas;
        $pmd_lampiran_01_old = $items->pmd_lampiran_01;
        $pmd_lampiran_02_old = $items->pmd_lampiran_02;

        $path = public_path('uploads/pengaduan_masyarakat/');
        
        if($request->file('pmd_lampiran_identitas') !== null && $request->file('pmd_lampiran_identitas') !== ''){
            File::delete($path.$pmd_lampiran_identitas_old);
        }

        if($request->file('pmd_lampiran_01') !== null && $request->file('pmd_lampiran_01') !== ''){
            File::delete($path.$pmd_lampiran_01_old);
        }

        if($request->file('pmd_lampiran_02') !== null && $request->file('pmd_lampiran_02') !== ''){
            File::delete($path.$pmd_lampiran_02_old);
        }

        if ($request->hasFile('pmd_lampiran_identitas')) {
            $pmd_lampiran_identitas = $request->file('pmd_lampiran_identitas');
            $pmd_lampiran_identitas_name = '-lamp id-' . rand() . '.' . $pmd_lampiran_identitas->getClientOriginalExtension();
            $pmd_lampiran_identitas->move(public_path('uploads/pengaduan_masyarakat'), $pmd_lampiran_identitas_name);
        } else {
            $pmd_lampiran_identitas_name = $pmd_lampiran_identitas_old;
        }

        if ($request->hasFile('pmd_lampiran_01')) {
            $pmd_lampiran_01 = $request->file('pmd_lampiran_01');
            $pmd_lampiran_01_name = '-lamp 01-' . rand() . '.' . $pmd_lampiran_01->getClientOriginalExtension();
            $pmd_lampiran_01->move(public_path('uploads/pengaduan_masyarakat'), $pmd_lampiran_01_name);
        } else {
            $pmd_lampiran_01_name = $pmd_lampiran_01_old;
        }

        if ($request->hasFile('pmd_lampiran_02')) {
            $pmd_lampiran_02 = $request->file('pmd_lampiran_02');
            $pmd_lampiran_02_name = '-lamp 02-' . rand() . '.' . $pmd_lampiran_02->getClientOriginalExtension();
            $pmd_lampiran_02->move(public_path('uploads/pengaduan_masyarakat'), $pmd_lampiran_02_name);
        } else {
            $pmd_lampiran_02_name = $pmd_lampiran_02_old;
        }

        $items->update([
            'pmd_sumber'             => $request->pmd_sumber,
            'pmd_sifat'              => $request->pmd_sifat,
            'pmd_no'                 => $request->pmd_no,
            'pmd_tanggal'            => $request->pmd_tanggal,
            'pmd_tanggal_terima'     => $request->pmd_tanggal_terima,
            'pmd_pelapor_nama'       => $request->pmd_pelapor_nama,
            'pmd_pelapor_pekerjaan'  => $request->pmd_pelapor_pekerjaan,
            'pmd_pelapor_telepon'    => $request->pmd_pelapor_telepon,
            'pmd_pelapor_email'      => $request->pmd_pelapor_email,
            'pmd_pelapor_alamat'     => $request->pmd_pelapor_alamat,
            'pmd_terlapor_nama'      => $request->pmd_terlapor_nama,
            'pmd_terlapor_pekerjaan' => $request->pmd_terlapor_pekerjaan,
            'pmd_terlapor_instansi'  => $request->pmd_terlapor_instansi,
            'pmd_terlapor_alamat'    => $request->pmd_terlapor_alamat,
            'pmd_kategori'           => $request->pmd_kategori,
            'pmd_judul'              => $request->pmd_judul,
            'pmd_isi'                => $request->pmd_isi,
            'pmd_harapan'            => $request->pmd_harapan,
            'pmd_catatan'            => $request->pmd_catatan,
            'pmd_lampiran_identitas' => $pmd_lampiran_identitas_name,
            'pmd_lampiran_01'        => $pmd_lampiran_01_name,
            'pmd_lampiran_02'        => $pmd_lampiran_02_name,
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        ]);

        $message = 'Berhasil mengubah data Pengaduan Masyarakat!';

        $items = PengaduanMasyarakatData::findOrFail($id);
        $items_pmr = PengaduanMasyarakatRiwayat::where('pmd_id', $id)->orderBy('pmr_no', 'ASC')->get();
        return view('admin.pengaduan_masyarakat_data.show', compact('items', 'items_pmr', 'message'));
    }

    
}
