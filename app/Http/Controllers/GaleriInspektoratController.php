<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriInspektorat;
use File;

class GaleriInspektoratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $perPage = 10;
        $items = GaleriInspektorat::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.galeri_inspektorat.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri_inspektorat.create');
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
            'image' => 'image|mimes:jpg,png,jpeg'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/galeri_inspektorat'), $new_name);
            $data = array(
                'name' => $request->name,
                'tahun'    => $request->tahun,
                'file'    => $new_name,
                
            );
            GaleriInspektorat::create($data);
            return redirect()->route('admin.galeri_inspektorat.index');
        } else {
            $data = array(
                'name' => $request->name,
                'tahun'    => $request->tahun,
            );
            GaleriInspektorat::create($data);
            return redirect()->route('admin.galeri_inspektorat.index');
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
        $data = GaleriInspektorat::findOrFail($id);
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
        $items = GaleriInspektorat::findOrFail($id);
        return view('admin.galeri_inspektorat.edit', compact('items'));
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
        $items = GaleriInspektorat::findOrFail($id);
        $items2 = GaleriInspektorat::findOrFail($id);
        $images_old = $items->file;
        $path = public_path('uploads/galeri_inspektorat/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/galeri_inspektorat/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->file;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.galeri_inspektorat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = GaleriInspektorat::findOrFail($id);

        $items->delete();
        return back();
    }
}
