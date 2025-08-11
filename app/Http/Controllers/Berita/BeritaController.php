<?php

namespace App\Http\Controllers\Berita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Berita;
use App\KategoriBerita;
use File;

class BeritaController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Berita::findOrFail($id);
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
}
