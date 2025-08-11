<?php

namespace App\Http\Controllers\ppid;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PpidPermohonanInformasi;
use Illuminate\Support\Facades\Auth;
use File;

date_default_timezone_set("Asia/Jakarta");

class PPIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = Berita::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.berita.index', compact('items', 'perPage'));
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permohonan_informasi()
    {
        $perPage = 10;
        $items = PpidPermohonanInformasi::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.ppid.permohonan_informasi', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = KategoriBerita::all();
        return view('admin.berita.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/berita'), $new_name);
            $data = array(
                'id_kategori'   => $request->id_kategori,
                'title'             => $request->title,
                'deskripsi'         => $request->deskripsi,
                'images'            => $new_name,
                'tag'               => $request->tag
            );
            Berita::create($data);
            return redirect()->route('admin.berita.index');
        } else {
            $data = array(
                'id_kategori'   => $request->id_kategori,
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi,
                'tag'               => $request->tag
            );
            Berita::create($data);
            return redirect()->route('admin.berita.index')->withSuccess('Great! Image has been successfully uploaded.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $pi_no
     * @return \Illuminate\Http\Response
     */
    public function show($pi_no)
    {
        $items = PpidPermohonanInformasi::findOrFail($pi_no);
        return response()->json($items);
    }
	
	/**
     * Display the specified resource.
     *
     * @param  string  $pi_no
     * @return \Illuminate\Http\Response
     */
    public function permohonan_informasi_show($pi_no)
    {
        //$items = PpidPermohonanInformasi::findOrFail($pi_no);
		$items = PpidPermohonanInformasi::where('pi_no', $pi_no)->first();
        return response()->json($items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Berita::findOrFail($id);
        $kategoriberita = KategoriBerita::all();
        return view('admin.berita.edit', compact('items','kategoriberita'));
    }
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permohonan_informasi_edit($id)
    {
        $items = PpidPermohonanInformasi::findOrFail($id);
        return view('admin.ppid.permohonan_informasi_edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $items = Berita::findOrFail($id);
        $items2 = Berita::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/berita/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/berita/'), $new_name);
            $items->update([
                'images' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        
        return redirect()->route('admin.berita.index');
    }
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permohonan_informasi_update(Request $request, $id)
    {
        $items = PpidPermohonanInformasi::findOrFail($id);
        $items2 = PpidPermohonanInformasi::findOrFail($id);
        $path = public_path('../../public/uploads/ppid_permohonan_informasi');
		
		if ($request->hasFile('pi_file_respon')) {
            $pi_file_respon = $request->file('pi_file_respon');
            $new_name = $items->pi_no . '_file_respon.' . $pi_file_respon->getClientOriginalExtension();
            $pi_file_respon->move(public_path('../ppid/public/uploads/ppid_permohonan_informasi'), $new_name);
			$items->update([
                'pi_file_respon' => $new_name
            ]);
        } else {
            $pi_file_respon = $items->pi_file_respon;
        }
		
		if ($request->pi_status === "" || $request->pi_status === null) {
			$items2->update([
				'pi_tanggal_selesai' 	=> null,
				'pi_catatan_respon' 	=> $request->pi_catatan_respon,
				'pi_status'				=> "N",
				'updated_by'			=> '['.Auth::user()->id.']'.Auth::user()->name,
				'updated_at'			=> date('Y-m-d H:i:s')
			]);
		} else {
			$items2->update([
				'pi_tanggal_selesai' 	=> $request->pi_tanggal_selesai,
				'pi_catatan_respon' 	=> $request->pi_catatan_respon,
				'pi_status'				=> $request->pi_status,
				'updated_by'			=> '['.Auth::user()->id.']'.Auth::user()->name,
				'updated_at'			=> date('Y-m-d H:i:s')
			]);
		}
		
        return redirect()->route('admin.ppid.permohonan_informasi')->withSuccess('Permohonan Informasi "'. $items->pi_no .'" Berhasil Direspon!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Berita::findOrFail($id);

        $items->delete();
        return back();
    }
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permohonan_informasi_destroy($id)
    {
        $items = PpidPermohonanInformasi::findOrFail($id);

        $items->delete();
        return back()->withSuccess('Permohonan Informasi "'. $items->pi_no .'" Berhasil Dihapus!');
    }
}
