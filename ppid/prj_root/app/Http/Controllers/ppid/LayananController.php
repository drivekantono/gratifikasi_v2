<?php

namespace App\Http\Controllers\ppid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\PpidDaftarInformasi;
use App\PpidPermohonanInformasi;
use DB;
use PDF;
use Carbon\Carbon;

class LayananController extends Controller
{
    public function index()
    {
       	$perPage = 10;
        $items = PpidDaftarInformasi::orderBy('created_at', 'ASC')->paginate($perPage);
		$informasi_berkala = PpidDaftarInformasi::where('kategori_informasi', 'Informasi Berkala')->first();
		$informasi_serta_merta = PpidDaftarInformasi::where('kategori_informasi', 'Informasi Serta-Merta')->first();
		$informasi_setiap_saat = PpidDaftarInformasi::where('kategori_informasi', 'Informasi Setiap Saat')->first();
		$informasi_dikecualikan = PpidDaftarInformasi::where('kategori_informasi', 'Informasi Dikecualikan')->first();
        return view('ppid.daftar_informasi.index', compact('items', 'perPage', 'informasi_berkala', 'informasi_serta_merta', 'informasi_setiap_saat', 'informasi_dikecualikan'));
    }
	
	public function daftar_informasi()
    {
        $items = PpidDaftarInformasi::orderBy('maingroup', 'DESC')->get();
        return view('ppid.layanan.daftar_informasi', compact('items'));
    }
	
	public function permohonan_informasi()
    {
        return view('ppid.layanan.permohonan_informasi');
    }
	
	public function buat_pi(Request $request)
    {
		/*$request->validate([
            'pi_no' => 'required',
            'pi_file_penunjang' => 'image|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);*/
		
		$items = PpidPermohonanInformasi::where('user_id', Auth::user()->id)->orderBy('pi_no', 'DESC')->first();
		if (count($items) > 0) {
			//$last_index = (str_replace("0", "", substr($items->pi_no, -3)))+1;
			$last_index = (substr($items->pi_no, -3))+1;
			$last_period = substr($items->pi_no, 2, 4);
			$curr_period = Carbon::now()->isoFormat('YYMM');
			if ($curr_period > $last_period) {
				$last_index = "1";
			}
		} else {
			$last_index = "1";
		}
		$last_index = substr("000".$last_index, -3);
		
		$id_user = Auth::user()->id;
		$id_user = substr("000".$id_user, -3);
		
		$gets_pi_no = "PI".Carbon::now()->isoFormat('YYMMDDHHmm').$id_user.$last_index;
		
		if ($request->hasFile('pi_file_penunjang')) {
            $pi_file_penunjang = $request->file('pi_file_penunjang');
            $new_name = $gets_pi_no . '_file_penunjang.' . $pi_file_penunjang->getClientOriginalExtension();
            $pi_file_penunjang->move(public_path('../../public/uploads/ppid_permohonan_informasi'), $new_name);
        } else {
            $new_name = "";
        }
		
		$data = array(
			'pi_no'					=> $gets_pi_no,
			'pi_tanggal_buat'		=> Carbon::now(),
			'pi_tanggal_selesai'	=> null,
			'user_id'				=> $request->user_id,
			'user_nama'				=> $request->user_nama,
			'user_nik'				=> $request->user_nik,
			'user_email'			=> $request->user_email,
			'user_telp'				=> $request->user_telp,
			'user_jenis_alamat'		=> $request->user_jenis_alamat,
			'user_alamat'			=> $request->user_alamat,
			'pi_jenis'				=> $request->pi_jenis,
			'pi_peruntukan'			=> $request->pi_peruntukan,
			'pi_informasi'			=> $request->pi_informasi,
			'pi_tujuan'				=> $request->pi_tujuan,
			'pi_peroleh_cara'		=> $request->pi_peroleh_cara,
			'pi_peroleh_bentuk'		=> $request->pi_peroleh_bentuk,
			'pi_catatan_buat'		=> $request->pi_catatan_buat,
			'pi_catatan_respon'		=> "",
			'pi_file_penunjang'		=> $new_name,
			'pi_file_respon'		=> "",
			'pi_status'				=> "N",
			'created_by'			=> $request->created_by,
			'created_at'			=> Carbon::now(),
			'updated_by'			=> $request->updated_by,
			'updated_at'			=> Carbon::now()
		);
			
    	PpidPermohonanInformasi::create($data);
    	return redirect()->route('ppid.layanan.permohonan_informasi')->withSuccess('Permohonan Informasi Berhasil Dibuat!');
    }
	
	public function lihat_pi($pi_no)
    {
        $items = PpidPermohonanInformasi::where('pi_no', $pi_no)->first();
        //return response()->json($items);
		return view('ppid.layanan.permohonan_informasi_lihat', compact('items'));
    }
	
	public function detail_pi($id)
    {
        $items = PpidPermohonanInformasi::findOrFail($id);
		//$items = PpidPermohonanInformasi::where('pi_no', $pi_no)->first();
        return response()->json($items);
    }
	
	public function cetak_pi($pi_no)
    {
        $items = PpidPermohonanInformasi::where('pi_no', $pi_no)->first();
        //$items = PpidPermohonanInformasi::get();
		
        $pdf = PDF::loadview('ppid.layanan.permohonan_informasi_cetak',['items'=>$items]);
    	//return $pdf->download('permohonan_informasi_cetak');
		return $pdf->stream('permohonan_informasi_'.$items->pi_no);
		//return view('ppid.layanan.permohonan_informasi_cetak', compact('items'));
    }
}
