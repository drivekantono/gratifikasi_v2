<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PengaduanMasyarakatLookup;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengaduanMasyarakatLookupController extends Controller
{
    public function index()
    {
        $perPage = 50;
        $items = PengaduanMasyarakatLookup::orderBy('pml_kategori', 'ASC')->paginate($perPage);
        return view('admin.pengaduan_masyarakat_lookup.index', compact('items', 'perPage'));
    }

    public function show($id)
    {
        $items = PengaduanMasyarakatLookup::findOrFail($id);
        return response()->json($items);
        //return view('admin.pengaduan_masyarakat_lookup.show', compact('items'));
    }

    public function create()
    {
        return view('admin.pengaduan_masyarakat_lookup.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'pml_main_kategori' => 'required',
            'pml_sub_kategori' => 'required',
            'pml_kategori' => 'required',
            'pml_nilai' => 'required',
            'pml_status' => 'required'
        ]);

        $data = array(
            'pml_main_kategori'    => $request->pml_main_kategori,
            'pml_sub_kategori'     => $request->pml_sub_kategori,
            'pml_kategori'        => $request->pml_kategori,
            'pml_nilai'       => $request->pml_nilai,
            'pml_status'      => $request->pml_status,
            'pml_catatan'     => $request->pml_catatan,
            'created_by'  => Auth::user()->id . " | " . Auth::user()->name,
            'created_at'  => Carbon::now('Asia/Jakarta'),
            'updated_by'  => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'  => Carbon::now('Asia/Jakarta')
        );

        PengaduanMasyarakatLookup::create($data);
        return redirect()->route('admin.pengaduan_masyarakat_lookup.index')->withSuccess('Berhasil menambahkan lookup Pengaduan Masyarakat!');
    }

    public function update(Request $request)
    {
        $data = array(
            'pml_nilai'       => $request->ubahNilai,
            'pml_status'      => $request->ubahStatus,
            'pml_catatan'     => $request->ubahCatatan,
            'updated_by'  => Auth::user()->id . " | " . Auth::user()->name,
            'updated_at'  => Carbon::now('Asia/Jakarta')
        );

        $items = PengaduanMasyarakatLookup::findOrFail($request->ubahId);
        $items->update($data);
        
        return redirect()->route('admin.pengaduan_masyarakat_lookup.index')->withSuccess('Berhasil mengubah lookup Pengaduan Masyarakat!');
    }

    public function destroy($id)
    {
        $items = PengaduanMasyarakatLookup::findOrFail($id);

        $items->delete();
        return redirect()->route('admin.pengaduan_masyarakat_lookup.index')->withSuccess('Berhasil menghapus lookup Pengaduan Masyarakat!');
    }
}
