<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PelaporanGratifikasiForm;
use App\PelaporanGratifikasiData;
use App\PelaporanGratifikasiLookup;
use App\PelaporanGratifikasiRiwayat;
use App\PelaporanGratifikasiUpgp;
use App\MailSend;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PelaporanGratifikasiUpgpController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = PelaporanGratifikasiUpgp::orderBy('created_at', 'DESC')->get();
        $items_mobile = PelaporanGratifikasiUpgp::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('admin.pelaporan_gratifikasi_upgp.index', compact('items', 'items_mobile', 'perPage'));
    }

    public function create_pgd($id)
    {
        $items_pgf = PelaporanGratifikasiForm::findOrFail($id);
        $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_lokasi_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'lokasi','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_jenis_objek = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        return view('admin.pelaporan_gratifikasi_form.create_pgd', compact('items_pgf', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_lokasi_objek', 'items_data_jenis_objek'));
    }

    /*
    public function show($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgf_id', $id)->orderBy('pgr_no', 'ASC')->get();
        $message = '';
        return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
    }

    public function print($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgf_id', $id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgf_no."-".substr("000".$gets_index, -3);

        $gets_pgr_catatan = "";

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        $data = array(
            'pgf_id'	    =>	$items->id,
            'pgf_no'	    =>	$items->pgf_no,
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

        return view('admin.pelaporan_gratifikasi_data.print', compact('items'));
    }

    public function formEmail()
    {
        return view('admin.pelaporan_gratifikasi_data.formemail');
    }

    public function sendEmail($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);

        Mail::to($items->pgf_pelapor_email)->send(new MailSend($items));

        $items->update([
            'pgf_verifikasi_kirim'   => Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM-DD'),
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        ]);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgf_id', $id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgf_no."-".substr("000".$gets_index, -3);

        $gets_pgr_catatan = "Hasil verifikasi telah dikirim ke email ".$items->pgf_pelapor_email;

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        $data = array(
            'pgf_id'	    =>	$items->id,
            'pgf_no'	    =>	$items->pgf_no,
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

        $message = 'Berhasil mengirim hasil verifikasi ke email '.$items->pgf_pelapor_email;
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgf_id', $id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $id)->withSuccess($message);
    }

    public function verif($pgf_id, $pgf_verifikasi)
    {
        $items = PelaporanGratifikasiData::findOrFail($pgf_id);

        $items->update([
            'pgf_verifikasi'         => $pgf_verifikasi,
            'updated_by'             => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'             => Carbon::now('Asia/Jakarta')
        ]);

        //create log pada pelaporan_gratifikasi_riwayats 
        $items_pgr_count = PelaporanGratifikasiRiwayat::where('pgf_id', $pgf_id)->count();
        $gets_index = $items_pgr_count + 1;
        $gets_pgr_no = $items->pgf_no."-".substr("000".$gets_index, -3);

        if ($pgf_verifikasi === 'Y') {
            $gets_pgr_catatan = "Laporan termasuk dalam gratifikasi";
            $message = 'Laporan berhasil di verifikasi termasuk dalam gratifikasi';
        } else {
            $gets_pgr_catatan = "Laporan tidak termasuk dalam gratifikasi";
            $message = 'Laporan berhasil di verifikasi tidak termasuk dalam gratifikasi';
        }

        $gets_user = Auth::user()->id . " | " . Auth::user()->name;

        $data = array(
            'pgf_id'	    =>	$items->id,
            'pgf_no'	    =>	$items->pgf_no,
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
        
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgf_id', $pgf_id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $pgf_id)->withSuccess($message);
    }
        
    public function store(Request $request)
    {
        $request->validate([
            'pgf_sumber'	            =>	'required',
            'pgf_tanggal_lapor'	        =>	'required',
            'pgf_pelapor_nama'	        =>	'required',
            'pgf_pelapor_telepon'	    =>	'required',
            'pgf_pelapor_email'	        =>	'required',
            'pgf_pelapor_instansi'	    =>	'required',
            'pgf_uraian'	            =>	'required',
            'pgf_nominal'	            =>	'required',
            'pgf_lampiran'              =>  'mimes:jpg,png,jpeg,pdf|max:20480'
        ]);
        
        $items = PelaporanGratifikasiForm::where('created_at', 'LIKE', Carbon::now('Asia/Jakarta')->isoFormat('YYYY-MM').'%')->count();
        $gets_index = $items + 1;
        $gets_index = substr("000".$gets_index, -3);
        $gets_pgf_no = "FORM".Carbon::now('Asia/Jakarta')->isoFormat('YYMM').$gets_index;

        if ($request->hasFile('pgf_lampiran')) {
            $pgf_lampiran = $request->file('pgf_lampiran');
            $pgf_lampiran_name = $gets_pgf_no . '-pgf_lampiran-' . rand() . '.' . $pgf_lampiran->getClientOriginalExtension();
            $pgf_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgf_lampiran_name);
        }else{
            $pgf_lampiran_name = null;
        }
        
        $gets_pgf_status = "Baru";

        if ($request->pgf_sumber === 'Website') {
            $gets_user = "web user";
        } else {
            $gets_user = Auth::user()->id . " | " . Auth::user()->name;
        }

        $data = array(
            'pgf_no'	                =>	$gets_pgf_no,
            'pgf_sumber'	            =>	$request->pgf_sumber,
            'pgf_tanggal_lapor'	        =>	$request->pgf_tanggal_lapor,
            'pgf_pelapor_nama'	        =>	$request->pgf_pelapor_nama,
            'pgf_pelapor_telepon'	    =>	$request->pgf_pelapor_telepon,
            'pgf_pelapor_email'	        =>	$request->pgf_pelapor_email,
            'pgf_pelapor_jabatan'	    =>	$request->pgf_pelapor_jabatan,
            'pgf_pelapor_unit_kerja'	=>	$request->pgf_pelapor_unit_kerja,
            'pgf_pelapor_instansi'	    =>	$request->pgf_pelapor_instansi,
            'pgf_uraian'	            =>	$request->pgf_uraian,
            'pgf_nominal'	            =>	$request->pgf_nominal,
            'pgf_catatan'	            =>	$request->pgf_catatan,
            'pgf_lampiran'	            =>	$pgf_lampiran_name,
            'pgf_status'	            =>	$gets_pgf_status,
            'created_by'                =>  $gets_user,
            'created_at'                =>  Carbon::now('Asia/Jakarta'),
            'updated_by'                =>  $gets_user,
            'updated_at'                =>  Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiForm::create($data);

        if ($request->pgf_sumber === 'Website') {
            $items_pesan = [
                'jenis' => 'success',
                'text'  => 'Terima kasih. Formulir Gratifikasi Anda telah masuk di UPG Pemerintah Provinsi Jawa Timur. </br>Hasil Verifikasi akan dikirimkan melalui email '.$request->pgf_pelapor_email
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
    /*
    public function destroy($id)
    {
        $items_pgd = PelaporanGratifikasiData::findOrFail($id);
        $items_pgd->delete();
        $items_pmr = PelaporanGratifikasiRiwayat::where('pgf_id', $id)->delete();

        return redirect()->route('admin.pelaporan_gratifikasi_data.index')->withSuccess('Berhasil berhasil dihapus!');
    }

    public function edit($id)
    {
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_data_hubungan = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'hubungan','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_peristiwa = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'peristiwa','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        $items_data_jenis = PelaporanGratifikasiLookup::where(['pgl_kategori'=>'jenis','pgl_status'=>'A'])->orderBy('pgl_nilai', 'ASC')->get();
        return view('admin.pelaporan_gratifikasi_data.edit', compact('items', 'items_data_hubungan', 'items_data_peristiwa', 'items_data_jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pgf_lampiran'              =>  'mimes:jpg,png,jpeg,pdf|max:10240',
            'pgf_penyaluran_lampiran'   =>  'mimes:jpg,png,jpeg,pdf|max:10240'
        ]);

        $items = PelaporanGratifikasiData::findOrFail($id);

        $pgf_lampiran_old = $items->pgf_lampiran;
        $pgf_penyaluran_lampiran_old = $items->pgf_penyaluran_lampiran;

        $path = public_path('uploads/pelaporan_gratifikasi/');
        
        if($request->file('pgf_lampiran') !== null && $request->file('pgf_lampiran') !== ''){
            File::delete($path.$pgf_lampiran_old);
        }

        if($request->file('pgf_penyaluran_lampiran') !== null && $request->file('pgf_penyaluran_lampiran') !== ''){
            File::delete($path.$pgf_penyaluran_lampiran_old);
        }

        if ($request->hasFile('pgf_lampiran')) {
            $pgf_lampiran = $request->file('pgf_lampiran');
            $pgf_lampiran_name = $items->pgf_no . '-pgf_lampiran-' . rand() . '.' . $pgf_lampiran->getClientOriginalExtension();
            $pgf_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgf_lampiran_name);
        }else{
            $pgf_lampiran_name = $pgf_lampiran_old;
        }

        if ($request->hasFile('pgf_penyaluran_lampiran')) {
            $pgf_penyaluran_lampiran = $request->file('pgf_penyaluran_lampiran');
            $pgf_penyaluran_lampiran_name = $items->pgf_no . '-pgf_penyaluran_lampiran-' . rand() . '.' . $pgf_penyaluran_lampiran->getClientOriginalExtension();
            $pgf_penyaluran_lampiran->move(public_path('uploads/pelaporan_gratifikasi'), $pgf_penyaluran_lampiran_name);
        }else{
            $pgf_penyaluran_lampiran_name = $pgf_penyaluran_lampiran_old;
        }

        $gets_pgf_status = "Updated";

        $items->update([
            'pgf_tanggal_lapor'	        =>	$request->pgf_tanggal_lapor,
            'pgf_pelapor_nik'	        =>	$request->pgf_pelapor_nik,
            'pgf_pelapor_nama'	        =>	$request->pgf_pelapor_nama,
            'pgf_pelapor_tempat_lahir'	=>	$request->pgf_pelapor_tempat_lahir,
            'pgf_pelapor_tanggal_lahir'	=>	$request->pgf_pelapor_tanggal_lahir,
            'pgf_pelapor_telepon'	    =>	$request->pgf_pelapor_telepon,
            'pgf_pelapor_email'	        =>	$request->pgf_pelapor_email,
            'pgf_pelapor_alamat_rumah'	=>	$request->pgf_pelapor_alamat_rumah,
            'pgf_pelapor_jabatan'	    =>	$request->pgf_pelapor_jabatan,
            'pgf_pelapor_unit_kerja'	=>	$request->pgf_pelapor_unit_kerja,
            'pgf_pelapor_instansi'	    =>	$request->pgf_pelapor_instansi,
            'pgf_pelapor_alamat_kantor'	=>	$request->pgf_pelapor_alamat_kantor,
            'pgf_pelapor_rahasia'	    =>	$request->pgf_pelapor_rahasia,
            'pgf_pemberi_nama'	        =>	$request->pgf_pemberi_nama,
            'pgf_pemberi_telepon'	    =>	$request->pgf_pemberi_telepon,
            'pgf_pemberi_pekerjaan'	    =>	$request->pgf_pemberi_pekerjaan,
            'pgf_pemberi_alamat'	    =>	$request->pgf_pemberi_alamat,
            'pgf_pemberi_hubungan'	    =>	$request->pgf_pemberi_hubungan,
            'pgf_kategori'	            =>	$request->pgf_kategori,
            'pgf_peristiwa'	            =>	$request->pgf_peristiwa,
            'pgf_jenis'	                =>	$request->pgf_jenis,
            'pgf_uraian'	            =>	$request->pgf_uraian,
            'pgf_tempat'	            =>	$request->pgf_tempat,
            'pgf_tanggal'	            =>	$request->pgf_tanggal,
            'pgf_nominal'	            =>	$request->pgf_nominal,
            'pgf_alasan'	            =>	$request->pgf_alasan,
            'pgf_kronologi'	            =>	$request->pgf_kronologi,
            'pgf_catatan'	            =>	$request->pgf_catatan,
            'pgf_lampiran'	            =>	$pgf_lampiran_name,
            'pgf_penyaluran_nama'	    =>	$request->pgf_penyaluran_nama,
            'pgf_penyaluran_tanggal'	=>	$request->pgf_penyaluran_tanggal,
            'pgf_penyaluran_alamat'	    =>	$request->pgf_penyaluran_alamat,
            'pgf_penyaluran_lampiran'	=>	$pgf_penyaluran_lampiran_name,
            'pgf_verifikasi'	        =>	$request->pgf_verifikasi,
            'pgf_status'	            =>	$gets_pgf_status,
            'updated_by'                =>  Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'                =>  Carbon::now('Asia/Jakarta')
        ]);

        $message = 'Berhasil mengubah data Laporan Gratifikasi!';
        $items = PelaporanGratifikasiData::findOrFail($id);
        $items_pgr = PelaporanGratifikasiRiwayat::where('pgf_id', $id)->orderBy('pgr_no', 'ASC')->get();
        //return view('admin.pelaporan_gratifikasi_data.show', compact('items', 'items_pgr', 'message'));
        return redirect()->route('admin.pelaporan_gratifikasi_data.show', $id)->withSuccess($message);
    }

    */
}
