<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use File;
use App\KategoriGaleri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = Galeri::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.galeri.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = KategoriGaleri::all();
        return view('admin.galeri.create', compact('items'));
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
            $image->move(public_path('uploads/galeri'), $new_name);
            $data = array(
                'deskripsi' => $request->deskripsi,
                'status'    => $request->status,
                'images'    => $new_name,
                'link_vidio'=> $request->link_vidio,
                'id_kategori' => $request->id_kategori
            );
            Galeri::create($data);
            return redirect()->route('admin.galeri.index');
        } else {
            $data = array(
                'deskripsi' => $request->deskripsi,
                'status'    => $request->status,
                'link_vidio' => $request->link_vidio,
                'id_kategori' => $request->id_kategori
            );
            Galeri::create($data);
            return redirect()->route('admin.galeri.index');
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
        $data = Galeri::findOrFail($id);
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
        $cats = KategoriGaleri::all();
        $items = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('items', 'cats'));
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
        $items = Galeri::findOrFail($id);
        $items2 = Galeri::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/galeri/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/galeri/'), $new_name);
            $items->update([
                'images' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.galeri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Galeri::findOrFail($id);

        $items->delete();
        return back();
    }
}
