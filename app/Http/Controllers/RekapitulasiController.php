<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekapitulasi;
use File;

class RekapitulasiController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = Rekapitulasi::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.rekapitulasi.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rekapitulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/rekapitulasi'), $new_name);
            $data = array(
                'title'    => $request->title,
                'deskripsi' => $request->deskripsi,
                'file'    => $new_name,
                
            );
            Rekapitulasi::create($data);
            return redirect()->route('admin.rekapitulasi.index');
        } else {
            $data = array(
                'title'    => $request->title,
                'deskripsi' => $request->deskripsi,
            );
            Rekapitulasi::create($data);
            return redirect()->route('admin.rekapitulasi.index');
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
        $data = Rekapitulasi::findOrFail($id);
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
        $items = Rekapitulasi::findOrFail($id);
        return view('admin.rekapitulasi.edit', compact('items'));
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
        $items = Rekapitulasi::findOrFail($id);
        $items2 = Rekapitulasi::findOrFail($id);
        $images_old = $items->file;
        $path = public_path('uploads/rekapitulasi/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/rekapitulasi/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->file;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.rekapitulasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Rekapitulasi::findOrFail($id);

        $items->delete();
        return back();
    }
}
