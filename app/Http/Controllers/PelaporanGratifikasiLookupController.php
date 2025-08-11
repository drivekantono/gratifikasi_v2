<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PelaporanGratifikasiLookup;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PelaporanGratifikasiLookupController extends Controller
{
    public function index()
    {
        $perPage = 50;
        $items = PelaporanGratifikasiLookup::orderBy('pgl_sub', 'ASC')->orderBy('pgl_kategori', 'ASC')->paginate($perPage);
        return view('admin.pelaporan_gratifikasi_lookup.index', compact('items', 'perPage'));
    }

    public function show($id)
    {
        $items = PelaporanGratifikasiLookup::findOrFail($id);
        return response()->json($items);
        //return view('admin.pelaporan_gratifikasi_lookup.show', compact('items'));
    }

    public function create()
    {
        return view('admin.pelaporan_gratifikasi_lookup.create');
    }

    public function store(Request $request)
    {
        /*
        $request->validate([
            'pgl_main' => 'required',
            'pgl_sub' => 'required',
            'pgl_kategori' => 'required',
            'pgl_nilai' => 'required',
            'pgl_status' => 'required'
        ]);*/

        $get_pgl_nilai = "";
        if ($request->pgl_sub === "FAQ") {
            $get_pgl_nilai = $request->pgl_nilai_area;
        } else {
            $get_pgl_nilai = $request->pgl_nilai;
        }

        $data = array(
            'pgl_main'      => $request->pgl_main,
            'pgl_sub'       => $request->pgl_sub,
            'pgl_kategori'  => $request->pgl_kategori,
            'pgl_nilai'     => $get_pgl_nilai,
            'pgl_status'    => $request->pgl_status,
            'pgl_catatan'   => $request->pgl_catatan,
            'created_by'    => Auth::user()->id . " | " . Auth::user()->name,
            'created_at'    => Carbon::now('Asia/Jakarta'),
            'updated_by'    => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'    => Carbon::now('Asia/Jakarta')
        );

        PelaporanGratifikasiLookup::create($data);
        return redirect()->route('admin.pelaporan_gratifikasi_lookup.index')->withSuccess('Berhasil menambahkan lookup Pelaporan Gratifikasi!');
    }

    public function update(Request $request)
    {
        $get_pgl_nilai = "";
        if ($request->pgl_sub === "FAQ") {
            $get_pgl_nilai = $request->pgl_nilai_area;
        } else {
            $get_pgl_nilai = $request->pgl_nilai;
        }

        $data = array(
            'pgl_kategori'    => $request->pgl_kategori,
            'pgl_nilai'       => $get_pgl_nilai,
            'pgl_status'      => $request->pgl_status,
            'pgl_catatan'     => $request->pgl_catatan,
            'updated_by'  => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'  => Carbon::now('Asia/Jakarta')
        );

        $items = PelaporanGratifikasiLookup::findOrFail($request->idLookup);
        $items->update($data);
        
        return redirect()->route('admin.pelaporan_gratifikasi_lookup.index')->withSuccess('Berhasil mengubah lookup Pelaporan Gratifikasi!');
    }

    public function destroy($id)
    {
        $items = PelaporanGratifikasiLookup::findOrFail($id);

        $items->delete();
        return redirect()->route('admin.pelaporan_gratifikasi_lookup.index')->withSuccess('Berhasil menghapus lookup Pelaporan Gratifikasi!');
    }
}
