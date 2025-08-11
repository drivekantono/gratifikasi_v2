<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PeraturanPerundangan;

class PeraturanPerundanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $perPage = 10;
        
        $items = PeraturanPerundangan::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.peraturan_perundangan.index', compact('items', 'perPage'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peraturan_perundangan.create');
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
            'image.*' => 'image|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/peraturan_perundangan'), $new_name);
            $data = array(
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi,
                'images'    => $new_name
            );
            PeraturanPerundangan::create($data);
            return redirect()->route('admin.peraturan_perundangan.index');
        } else {
            $data = array(
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi
            );
            PeraturanPerundangan::create($data);
            return redirect()->route('admin.peraturan_perundangan.index');
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
        $data = PeraturanPerundangan::findOrFail($id);
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
        $items = PeraturanPerundangan::findOrFail($id);
        return view('admin.peraturan_perundangan.edit', compact('items'));
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
    
        $items = PeraturanPerundangan::findOrFail($id);
        $items2 = PeraturanPerundangan::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/peraturan_perundangan/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/peraturan_perundangan/'), $new_name);
            $items->update([
                'images' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.peraturan_perundangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = PeraturanPerundangan::findOrFail($id);
        $items->delete();
        return back();
    }
}
