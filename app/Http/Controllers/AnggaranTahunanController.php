<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnggaranTahunan;
use File;

class AnggaranTahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = AnggaranTahunan::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.anggaran_tahunan.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anggaran_tahunan.create');
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
            'image.*' => 'image|mimes:jpg,png,jpeg,pdf, doc, docx|max:10000'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/anggaran_tahunan'), $new_name);
            $data = array(
                'tahun'    => $request->tahun,
                'deskripsi' => $request->deskripsi,
                'file'    => $new_name,
                
            );
            AnggaranTahunan::create($data);
            return redirect()->route('admin.anggaran_tahunan.index');
        } else {
            $data = array(
                'tahun'    => $request->tahun,
                'deskripsi' => $request->deskripsi,
            );
            AnggaranTahunan::create($data);
            return redirect()->route('admin.anggaran_tahunan.index');
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
        $data = AnggaranTahunan::findOrFail($id);
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
        $items = AnggaranTahunan::findOrFail($id);
        return view('admin.anggaran_tahunan.edit', compact('items'));
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
            'title' => 'required',
            'image.*' => 'image|mimes:jpg,png,jpeg,pdf, doc, docx|max:10000'
        ]);
        $items = AnggaranTahunan::findOrFail($id);
        $items2 = AnggaranTahunan::findOrFail($id);
        $images_old = $items->file;
        $path = public_path('uploads/anggaran_tahunan/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/anggaran_tahunan/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->file;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.anggaran_tahunan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = AnggaranTahunan::findOrFail($id);

        $items->delete();
        return back();
    }
}
