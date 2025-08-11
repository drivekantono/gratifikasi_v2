<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RenstraStrategis;
use File;

class RenstraStrategisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = RenstraStrategis::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.renstra_strategis.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.renstra_strategis.create');
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
            'image' => 'mimes:pdf, doc, docx|max:5000'
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/renstra_strategis'), $new_name);
            $data = array(
                
                'deskripsi' => $request->deskripsi,
                'tahun1' => $request->tahun1,
                'tahun2' => $request->tahun1,
                'file'    => $new_name,

            );
            
            RenstraStrategis::create($data);
            return redirect()->route('admin.renstra_strategis.index')->withSuccess('Great! Data has been successfully uploaded withoutfile.');
        } else {
            $data = array(
                
                'deskripsi' => $request->deskripsi,
                'tahun1' => $request->tahun1,
                'tahun2' => $request->tahun1,
            );
            RenstraStrategis::create($data);
            return redirect()->route('admin.renstra_strategis.index')->withSuccess('Great! Data has been successfully uploaded with file.');
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
        $data = RenstraStrategis::findOrFail($id);
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
        $items = RenstraStrategis::findOrFail($id);
        return view('admin.renstra_strategis.edit', compact('items'));
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
            'image' => 'mimes:doc, docx, pdf|max:5000'
        ]);
        $items = RenstraStrategis::findOrFail($id);
        $items2 = RenstraStrategis::findOrFail($id);
        $images_old = $items->file;
        $path = public_path('uploads/renstra_strategis/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/renstra_strategis/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        
        return redirect()->route('admin.renstra_strategis.index')->withSuccess('Great! Data has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = RenstraStrategis::findOrFail($id);


        $cekdel = RenstraStrategis::all();
        if($cekdel->count() <= 1){
            return redirect()->route('admin.renstra_strategis.index')->withSuccess('Tidak bisa dihapus, tabel tidak boleh kosong');
        }
        $items->delete();
        return back();
    }
}
