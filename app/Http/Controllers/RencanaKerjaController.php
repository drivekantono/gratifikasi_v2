<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RencanaKerja;
use File;
class RencanaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = RencanaKerja::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.rencana_kerja.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rencana_kerja.create');
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
            'image.*' => 'image|mimes:jpg,png,jpeg,pdf, doc, docx|max:10000'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/rencana_kerja'), $new_name);
            $data = array(

                'deskripsi' => $request->deskripsi,
                'tahun' => $request->tahun,
                'file'    => $new_name,

            );
            RencanaKerja::create($data);
            return redirect()->route('admin.rencana_kerja.index')->withSuccess('Great! Data has been successfully uploaded.');
        } else {
            $data = array(

                'deskripsi' => $request->deskripsi,
                'tahun' => $request->tahun,
                
            );
            RencanaKerja::create($data);
            return redirect()->route('admin.rencana_kerja.index')->withSuccess('Great! Data has been successfully uploaded.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RencanaKerja::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = RencanaKerja::findOrFail($id);
        return view('admin.rencana_kerja.edit', compact('items'));
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
         $request->validate([
            'image.*' => 'image|mimes:jpg,png,jpeg,pdf, doc, docx|max:10000'
        ]);
        
        $items = RencanaKerja::findOrFail($id);
        $items2 = RencanaKerja::findOrFail($id);
        $images_old = $items->file;
        $path = public_path('uploads/rencana_kerja/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/rencana_kerja/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));

        return redirect()->route('admin.rencana_kerja.index')->withSuccess('Great! Data has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = RencanaKerja::findOrFail($id);
        $cekdel = RencanaKerja::all();
        if($cekdel->count() <= 1){
            return redirect()->route('admin.rencana_kerja.index')->withSuccess('Tidak bisa dihapus, tabel tidak boleh kosong');
        }
        $items->delete();
        return back();
    }
}
