<?php

namespace App\Http\Controllers;

use App\LinkLayanan;
use Illuminate\Http\Request;
use File;

class LinkLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = LinkLayanan::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.link_layanan.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link_layanan.create');
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
            $image->move(public_path('uploads/link_layanan'), $new_name);
            $data = array(
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi,
                'images'    => $new_name,
                'link'   => $request->link
            );
            LinkLayanan::create($data);
            return redirect()->route('admin.link_layanan.index');
        } else {
            $data = array(
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi
            );
            LinkLayanan::create($data);
            return redirect()->route('admin.link_layanan.index')->withSuccess('Great! Image has been successfully uploaded.');
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
        $data = LinkLayanan::findOrFail($id);
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
        $items = LinkLayanan::findOrFail($id);
        return view('admin.link_layanan.edit', compact('items'));
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
        // 
        $request->validate([
            'title' => 'required',
            'image.*' => 'image|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);
        $items = LinkLayanan::findOrFail($id);
        $items2 = LinkLayanan::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/link_layanan/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/link_layanan/'), $new_name);
            $items->update([
                'images' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.link_layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = LinkLayanan::findOrFail($id);

        $items->delete();
        return back();
    }
}
