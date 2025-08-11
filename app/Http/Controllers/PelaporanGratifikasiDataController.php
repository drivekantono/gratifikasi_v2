<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PelaporanGratifikasiData;
use App\PelaporanGratifikasiLookup;
use App\PelaporanGratifikasiRiwayat;
use App\MailSend;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PelaporanGratifikasiDataController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = PelaporanGratifikasiData::orderBy('created_at', 'DESC')->get();
        $items_mobile = PelaporanGratifikasiData::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('admin.pelaporan_gratifikasi_data.index', compact('items', 'items_mobile', 'perPage'));
    }

    public function create()
    {
        $items_pgd = PelaporanGratifikasiData::orderBy('created_at', 'ASC')->get();
        $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_lokasi_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'lokasi','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_jenis_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        return view('admin.pelaporan_gratifikasi_data.create', compact('items_pgd', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_lokasi_objek', 'items_data_jenis_objek'));
    }

    public function show($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->orderBy('pgr_no', 'ASC')->get();
        $message = '';
        return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
    }

    public function print($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgd_no."-".substr("000".$gets_index, -3);

        $gets_pgr_catatan = "";

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        $data = array(
            'pgd_id'	    =>	$items->id,
            'pgd_no'	    =>	$items->pgd_no,
            'pgr_no'	    =>	$gets_pgr_no,
            'pgr_tanggal'	=>	Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'pgr_oleh'	    =>	$gets_user,
            'pgr_aksi'	    =>	"Cetak",
            'pgr_catatan'	=>	$gets_pgr_catatan,
            'pgr_status'	=>	"P",
            'created_by'    =>  $gets_user,
            'created_at'    =>  Carbon::now('Asia/Jakarta'),
            'updated_by'    =>  $gets_user,
            'updated_at'    =>  Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiRiwayat::create($data);

        $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_lokasi_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'lokasi','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_jenis_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();

        return view('admin.pelaporan_gratifikasi_data.print', compact('items', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_lokasi_objek', 'items_data_jenis_objek'));
    }

    public function formEmail()
    {
        return view('admin.pelaporan_gratifikasi_data.formemail');
    }

    public function sendEmail($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);

        Mail::to($items->pgd_pelapor_email)->send(new MailSend($items));

        $items->update([
            'pgd_verifikasi_kirim'   => Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        ]);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgd_no."-".substr("000".$gets_index, -3);

        $gets_pgr_catatan = "Hasil verifikasi telah dikirim ke email ".$items->pgd_pelapor_email;

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        $data = array(
            'pgd_id'	    =>	$items->id,
            'pgd_no'	    =>	$items->pgd_no,
            'pgr_no'	    =>	$gets_pgr_no,
            'pgr_tanggal'	=>	Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'pgr_oleh'	    =>	$gets_user,
            'pgr_aksi'	    =>	"Kirim Email",
            'pgr_catatan'	=>	$gets_pgr_catatan,
            'pgr_status'	=>	"P",
            'created_by'    =>  $gets_user,
            'created_at'    =>  Carbon::now('Asia/Jakarta'),
            'updated_by'    =>  $gets_user,
            'updated_at'    =>  Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiRiwayat::create($data);

        $message = 'Berhasil mengirim hasil verifikasi ke email '.$items->pgd_pelapor_email;
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $id)->withSuccess($message);
    }

    public function sendWA(Request $request)
    {
        $id = $request->pgd_id;
        $items = PelaporanGratifikasiData::findOrFail($id);

        $items->update([
            'pgd_verifikasi_kirim'   => Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        ]);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgd_no."-".substr("000".$gets_index, -3);

        $gets_pgr_catatan = "Hasil verifikasi telah dikirim ke nomor Whatsapp ".$items->pgd_pelapor_telepon;

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        //create post
        $post = PelaporanGratifikasiRiwayat::create([
            'pgd_id'	    =>	$id,
            'pgd_no'	    =>	$items->pgd_no,
            'pgr_no'	    =>	$gets_pgr_no,
            'pgr_tanggal'	=>	Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'pgr_oleh'	    =>	$gets_user,
            'pgr_aksi'	    =>	"Kirim WA",
            'pgr_catatan'	=>	$gets_pgr_catatan,
            'pgr_status'	=>	"P",
            'created_by'    =>  $gets_user,
            'created_at'    =>  Carbon::now('Asia/Jakarta'),
            'updated_by'    =>  $gets_user,
            'updated_at'    =>  Carbon::now('Asia/Jakarta')
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $post  
        ]);
    }

    public function verif($pgd_id, $pgd_verifikasi)
    {
        $items = PelaporanGratifikasiData::findOrFail($pgd_id);

        $items->update([
            'pgd_verifikasi'         => $pgd_verifikasi,
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        ]);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgd_id', $pgd_id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgd_no."-".substr("000".$gets_index, -3);

        if ($pgd_verifikasi === 'Y') {
            $gets_pgr_catatan = "Laporan termasuk dalam gratifikasi";
            $message = 'Laporan berhasil di verifikasi termasuk dalam gratifikasi';
        } else {
            $gets_pgr_catatan = "Laporan tidak termasuk dalam gratifikasi";
            $message = 'Laporan berhasil di verifikasi tidak termasuk dalam gratifikasi';
        }

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        $data = array(
            'pgd_id'	    =>	$items->id,
            'pgd_no'	    =>	$items->pgd_no,
            'pgr_no'	    =>	$gets_pgr_no,
            'pgr_tanggal'	=>	Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'pgr_oleh'	    =>	$gets_user,
            'pgr_aksi'	    =>	"Verifikasi",
            'pgr_catatan'	=>	$gets_pgr_catatan,
            'pgr_status'	=>	"P",
            'created_by'    =>  $gets_user,
            'created_at'    =>  Carbon::now('Asia/Jakarta'),
            'updated_by'    =>  $gets_user,
            'updated_at'    =>  Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiRiwayat::create($data);
        
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgd_id', $pgd_id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $pgd_id)->withSuccess($message);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pgd_sumber'	            =>	'required',
            'pgd_tanggal_lapor'	        =>	'required',
            'pgd_pelapor_nik'	        =>	'required',
            'pgd_pelapor_nama'	        =>	'required',
            'pgd_pelapor_telepon'	    =>	'required',
            'pgd_pelapor_email'	        =>	'required',
            'pgd_pelapor_jabatan'	    =>	'required',
            'pgd_pelapor_instansi'	    =>	'required',
            'pgd_pelapor_rahasia'	    =>	'required',
            'pgd_pemberi_nama'	        =>	'required',
            'pgd_pemberi_instansi'	    =>	'required',
            'pgd_pemberi_hubungan'	    =>	'required',
            'pgd_jenis_laporan'	        =>	'required',
            'pgd_peristiwa'         	=>	'required',
            'pgd_lokasi_objek'         	=>	'required',
            'pgd_jenis_objek'	        =>	'required',
            'pgd_uraian'	            =>	'required',
            'pgd_tempat'	            =>	'required',
            'pgd_tanggal'	            =>	'required',
            'pgd_nominal'	            =>	'required',
            'pgd_alasan'	            =>	'required',
            'pgd_kronologi'	            =>	'required',
            'pgd_kompensasi'            =>	'required',
            'pgd_lampiran'              =>  'mimes:jpg,png,jpeg,pdf|max:10240'
        ]);
        
        $items = PelaporanGratifikasiData::where('created_at', 'LIKE', Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM').'%')->count();
        $gets_index = $items + 1;
        $gets_index = substr("000".$gets_index, -3);
        $gets_pgd_no = "PG".Carbon::now('Asia/Jakarta')->isoFormat('YYMM').$gets_index;

        if ($request->hasFile('pgd_lampiran')) {
            $pgd_lampiran = $request->file('pgd_lampiran');
            $pgd_lampiran_name = $gets_pgd_no . '-pgd_lampiran-' . rand() . '.' . $pgd_lampiran->getClientOriginalExtension();
            $pgd_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgd_lampiran_name);
        }else{
            $pgd_lampiran_name = null;
        }

        /*if ($request->hasFile('pgd_penyaluran_lampiran')) {
            $pgd_penyaluran_lampiran = $request->file('pgd_penyaluran_lampiran');
            $pgd_penyaluran_lampiran_name = $gets_pgd_no . '-pgd_penyaluran_lampiran-' . rand() . '.' . $pgd_penyaluran_lampiran->getClientOriginalExtension();
            $pgd_penyaluran_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgd_penyaluran_lampiran_name);
        }else{
            $pgd_penyaluran_lampiran_name = null;
        }*/
        
        $gets_pgd_status = "Baru";

        if ($request->pgd_sumber === 'Website') {
            $gets_user = "web user";
        } else {
            $gets_user = Auth::user()->id . " | " . Auth::user()->name;
        }

        if ($request->pgd_pemberi_hubungan = "Lainnya") {
            $request->validate([
                'pgd_pemberi_hubungan_lainnya_input'	=>	'required'
            ]);
            $pgd_pemberi_hubungan_temp = $request->pgd_pemberi_hubungan_lainnya_input;
        }else{
            $pgd_pemberi_hubungan_temp = $request->pgd_pemberi_hubungan;
        }

        if ($request->pgd_peristiwa = "Lainnya") {
            $request->validate([
                'pgd_peristiwa_lainnya_input'	=>	'required'
            ]);
            $pgd_peristiwa_temp = $request->pgd_peristiwa_lainnya_input;
        }else{
            $pgd_peristiwa_temp = $request->pgd_peristiwa;
        }

        if ($request->pgd_lokasi_objek = "Lainnya") {
            $request->validate([
                'pgd_lokasi_objek_lainnya_input'	=>	'required'
            ]);
            $pgd_lokasi_objek_temp = $request->pgd_lokasi_objek_lainnya_input;
        }else{
            $pgd_lokasi_objek_temp = $request->pgd_lokasi_objek;
        }

        if ($request->pgd_jenis_objek = "Lainnya") {
            $request->validate([
                'pgd_jenis_objek_lainnya_input'	=>	'required'
            ]);
            $pgd_jenis_objek_temp = $request->pgd_jenis_objek_lainnya_input;
        }else{
            $pgd_jenis_objek_temp = $request->pgd_jenis_objek;
        }

        $data = array(
            'pgd_no'	                =>	$gets_pgd_no,
            'pgd_sumber'	            =>	$request->pgd_sumber,
            'pgd_tanggal_lapor'	        =>	$request->pgd_tanggal_lapor,
            'pgd_tanggal_lapor_upgp'    =>	$request->pgd_tanggal_lapor_upgp,
            'pgd_pelapor_nik'	        =>	$request->pgd_pelapor_nik,
            'pgd_pelapor_nama'	        =>	$request->pgd_pelapor_nama,
            'pgd_pelapor_tempat_lahir'	=>	$request->pgd_pelapor_tempat_lahir,
            'pgd_pelapor_tanggal_lahir'	=>	$request->pgd_pelapor_tanggal_lahir,
            'pgd_pelapor_telepon'	    =>	$request->pgd_pelapor_telepon,
            'pgd_pelapor_email'	        =>	$request->pgd_pelapor_email,
            'pgd_pelapor_alamat_rumah'	=>	$request->pgd_pelapor_alamat_rumah,
            'pgd_pelapor_jabatan'	    =>	$request->pgd_pelapor_jabatan,
            'pgd_pelapor_instansi'	    =>	$request->pgd_pelapor_instansi,
            'pgd_pelapor_rahasia'	    =>	$request->pgd_pelapor_rahasia,
            'pgd_pemberi_nama'	        =>	$request->pgd_pemberi_nama,
            'pgd_pemberi_instansi'	    =>	$request->pgd_pemberi_instansi,
            'pgd_pemberi_alamat'	    =>	$request->pgd_pemberi_alamat,
            'pgd_pemberi_hubungan'	    =>	$pgd_pemberi_hubungan_temp,
            'pgd_jenis_laporan'	        =>	$request->pgd_jenis_laporan,
            'pgd_peristiwa'	            =>	$pgd_peristiwa_temp,
            'pgd_lokasi_objek'          =>	$pgd_lokasi_objek_temp,
            'pgd_jenis_objek'           =>	$pgd_jenis_objek_temp,
            'pgd_uraian'	            =>	$request->pgd_uraian,
            'pgd_tempat'	            =>	$request->pgd_tempat,
            'pgd_tanggal'	            =>	$request->pgd_tanggal,
            'pgd_nominal'	            =>	$request->pgd_nominal,
            'pgd_alasan'	            =>	$request->pgd_alasan,
            'pgd_kronologi'	            =>	$request->pgd_kronologi,
            'pgd_catatan'	            =>	$request->pgd_catatan,
            'pgd_lampiran'	            =>	$pgd_lampiran_name,
            'pgd_kompensasi'            =>	$request->pgd_kompensasi,
            'pgd_verifikasi'	        =>	$request->pgd_verifikasi,
            'pgd_catatan_upg'	        =>	$request->pgd_catatan_upg,
            'pgd_status'	            =>	$gets_pgd_status,
            'created_by'                =>  $gets_user,
            'created_at'                =>  Carbon::now('Asia/Jakarta'),
            'updated_by'                =>  $gets_user,
            'updated_at'                =>  Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiData::create($data);

        if ($request->pgd_sumber === 'Website') {
            $items_pesan = [
                'jenis' => 'success',
                'text'  => 'Terima kasih. Pelaporan Gratifikasi Anda telah masuk di UPG Pemerintah Provinsi Jawa Timur. </br>Hasil Verifikasi akan dikirimkan melalui email '.$request->pgd_pelapor_email
            ];
            $items_pgd = PelaporanGratifikasiData::orderBy('created_at', 'ASC')->get();
            $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
            $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
            $items_data_lokasi_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'lokasi','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
            $items_data_jenis_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
            $items_faq = PelaporanGratifikasiLookup::where(['pgl_sub'=>'FAQ','pgl_status'=>'A'])->orderBy('pgl_kategori', 'ASC')->get();
            return view('frontend.informasi_public.pelaporan_gratifikasi', compact('items_pgd', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_lokasi_objek', 'items_data_jenis_objek', 'items_pesan', 'items_faq'));
        } else {
            return redirect()->route('admin.pelaporan_gratifikasi_data.index')->withSuccess('Berhasil menambahkan laporan gratifikasi!');
        }
    }

    public function destroy($id)
    {
        $items_pgd = PelaporanGratifikasiData::findOrFail($id);
        $items_pgd->delete();
        $items_pmr = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->delete();

        return redirect()->route('admin.pelaporan_gratifikasi_data.index')->withSuccess('Berhasil berhasil dihapus!');
    }

    public function edit($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_lokasi_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'lokasi','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_jenis_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        return view('admin.pelaporan_gratifikasi_data.edit', compact('items', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_lokasi_objek', 'items_data_jenis_objek'));
    }

    public function verifikasi($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);
        return view('admin.pelaporan_gratifikasi_data.verifikasi', compact('items'));
    }

    public function kirim($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);
        return view('admin.pelaporan_gratifikasi_data.kirim', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pgd_tanggal_lapor'	        =>	'required',
            'pgd_pelapor_nik'	        =>	'required',
            'pgd_pelapor_nama'	        =>	'required',
            'pgd_pelapor_telepon'	    =>	'required',
            'pgd_pelapor_email'	        =>	'required',
            'pgd_pelapor_jabatan'	    =>	'required',
            'pgd_pelapor_instansi'	    =>	'required',
            'pgd_pelapor_rahasia'	    =>	'required',
            'pgd_pemberi_nama'	        =>	'required',
            'pgd_pemberi_instansi'	    =>	'required',
            'pgd_pemberi_hubungan_lainnya_input'=>	'required',
            'pgd_jenis_laporan'	                =>	'required',
            'pgd_peristiwa_lainnya_input'       =>	'required',
            'pgd_lokasi_objek_lainnya_input'    =>	'required',
            'pgd_jenis_objek_lainnya_input'	    =>	'required',
            'pgd_uraian'	            =>	'required',
            'pgd_tempat'	            =>	'required',
            'pgd_tanggal'	            =>	'required',
            'pgd_nominal'	            =>	'required',
            'pgd_alasan'	            =>	'required',
            'pgd_kronologi'	            =>	'required',
            'pgd_kompensasi'            =>	'required',
            'pgd_lampiran'              =>  'mimes:jpg,png,jpeg,pdf|max:10240'
        ]);

        $items = PelaporanGratifikasiData::findOrFail($id);

        $pgd_lampiran_old = $items->pgd_lampiran;
        //$pgd_penyaluran_lampiran_old = $items->pgd_penyaluran_lampiran;

        $path = public_path('uploads/pelaporan_gratifikasi/');
        
        if($request->file('pgd_lampiran') !== null && $request->file('pgd_lampiran') !== ''){
            File::delete($path.$pgd_lampiran_old);
        }

        /*if($request->file('pgd_penyaluran_lampiran') !== null && $request->file('pgd_penyaluran_lampiran') !== ''){
            File::delete($path.$pgd_penyaluran_lampiran_old);
        }*/

        if ($request->hasFile('pgd_lampiran')) {
            $pgd_lampiran = $request->file('pgd_lampiran');
            $pgd_lampiran_name = $items->pgd_no . '-pgd_lampiran-' . rand() . '.' . $pgd_lampiran->getClientOriginalExtension();
            $pgd_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgd_lampiran_name);
        }else{
            $pgd_lampiran_name = $pgd_lampiran_old;
        }

        /*if ($request->hasFile('pgd_penyaluran_lampiran')) {
            $pgd_penyaluran_lampiran = $request->file('pgd_penyaluran_lampiran');
            $pgd_penyaluran_lampiran_name = $items->pgd_no . '-pgd_penyaluran_lampiran-' . rand() . '.' . $pgd_penyaluran_lampiran->getClientOriginalExtension();
            $pgd_penyaluran_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgd_penyaluran_lampiran_name);
        }else{
            $pgd_penyaluran_lampiran_name = $pgd_penyaluran_lampiran_old;
        }*/

        $gets_pgd_status = "Updated";

        $items->update([
            'pgd_tanggal_lapor'	        =>	$request->pgd_tanggal_lapor,
            'pgd_tanggal_lapor_upgp'    =>	$request->pgd_tanggal_lapor_upgp,
            'pgd_pelapor_nik'	        =>	$request->pgd_pelapor_nik,
            'pgd_pelapor_nama'	        =>	$request->pgd_pelapor_nama,
            'pgd_pelapor_tempat_lahir'	=>	$request->pgd_pelapor_tempat_lahir,
            'pgd_pelapor_tanggal_lahir'	=>	$request->pgd_pelapor_tanggal_lahir,
            'pgd_pelapor_telepon'	    =>	$request->pgd_pelapor_telepon,
            'pgd_pelapor_email'	        =>	$request->pgd_pelapor_email,
            'pgd_pelapor_alamat_rumah'	=>	$request->pgd_pelapor_alamat_rumah,
            'pgd_pelapor_jabatan'	    =>	$request->pgd_pelapor_jabatan,
            'pgd_pelapor_instansi'	    =>	$request->pgd_pelapor_instansi,
            'pgd_pelapor_rahasia'	    =>	$request->pgd_pelapor_rahasia,
            'pgd_pemberi_nama'	        =>	$request->pgd_pemberi_nama,
            'pgd_pemberi_instansi'	    =>	$request->pgd_pemberi_instansi,
            'pgd_pemberi_alamat'	    =>	$request->pgd_pemberi_alamat,
            'pgd_pemberi_hubungan'	    =>	$request->pgd_pemberi_hubungan_lainnya_input,
            'pgd_jenis_laporan'	        =>	$request->pgd_jenis_laporan,
            'pgd_peristiwa'	            =>	$request->pgd_peristiwa_lainnya_input,
            'pgd_lokasi_objek'	        =>	$request->pgd_lokasi_objek_lainnya_input,
            'pgd_jenis_objek'	        =>	$request->pgd_jenis_objek_lainnya_input,
            'pgd_uraian'	            =>	$request->pgd_uraian,
            'pgd_tempat'	            =>	$request->pgd_tempat,
            'pgd_tanggal'	            =>	$request->pgd_tanggal,
            'pgd_nominal'	            =>	$request->pgd_nominal,
            'pgd_alasan'	            =>	$request->pgd_alasan,
            'pgd_kronologi'	            =>	$request->pgd_kronologi,
            'pgd_catatan'	            =>	$request->pgd_catatan,
            'pgd_lampiran'	            =>	$pgd_lampiran_name,
            'pgd_kompensasi'    	    =>	$request->pgd_kompensasi,
            'pgd_verifikasi'	        =>	$request->pgd_verifikasi,
            'pgd_catatan_upg'	        =>	$request->pgd_catatan_upg,
            'pgd_status'	            =>	$gets_pgd_status,
            'updated_by'                =>  Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'                =>  Carbon::now('Asia/Jakarta')
        ]);

        $message = 'Berhasil Mengubah Data Laporan Gratifikasi!';
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $id)->withSuccess($message);
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'pgd_verifikasi'            =>	'required'
        ]);

        $items = PelaporanGratifikasiData::findOrFail($id);

        if ($request->pgd_verifikasi === "Lengkap") {
            $gets_pgd_status = "Verifikasi Lengkap";
            $gets_pgr_catatan = "Verifikasi Berkas Laporan Lengkap";
        }else{
            $gets_pgd_status = "Verifikasi Belum Lengkap";
            $gets_pgr_catatan = "Verifikasi Berkas Laporan Belum Lengkap";
        }

        $items->update([
            'pgd_verifikasi'	        =>	$request->pgd_verifikasi,
            'pgd_catatan_upg'	        =>	$request->pgd_catatan_upg,
            'pgd_status'	            =>	$gets_pgd_status,
            'updated_by'                =>  Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'                =>  Carbon::now('Asia/Jakarta')
        ]);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgd_no."-".substr("000".$gets_index, -3);

        $data = array(
            'pgd_id'	    =>	$items->id,
            'pgd_no'	    =>	$items->pgd_no,
            'pgr_no'	    =>	$gets_pgr_no,
            'pgr_tanggal'	=>	Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'pgr_oleh'	    =>	Auth::user()->id . " | " . Auth::user()->name,
            'pgr_aksi'	    =>	"Verifikasi",
            'pgr_catatan'	=>	$gets_pgr_catatan,
            'pgr_status'	=>	"P",
            'created_by'    =>  Auth::user()->id . " | " . Auth::user()->name,
            'created_at'    =>  Carbon::now('Asia/Jakarta'),
            'updated_by'    =>  Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'    =>  Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiRiwayat::create($data);

        $message = 'Berhasil Memverifikasi Data Laporan Gratifikasi!';
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgd_id', $id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $id)->withSuccess($message);
    }

    
}
