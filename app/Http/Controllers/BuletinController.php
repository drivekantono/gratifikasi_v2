<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buletin;
use File;

class BuletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage =10;
        $items = Buletin::orderBy('created_at', 'DESC')->paginate($perPage);

        return view('admin.buletin.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buletin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/buletin'), $new_name);
            $data = array(
                'title' => $request->title,
                'tahun' => $request->tahun,
                'file'    => $new_name,
            );
            Buletin::create($data);
            return redirect()->route('admin.buletin.index')->withSuccess('Great! Data has been successfully uploaded.');
        } else {
            $data = array(
                'title' => $request->title,
                'tahun' => $request->tahun,
            );
            Buletin::create($data);
            return redirect()->route('admin.buletin.index')->withSuccess('Great! Data has been successfully uploaded.');
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
        $data = Buletin::findOrFail($id);
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
        $items = Buletin::findOrFail($id);
        return view('admin.buletin.edit', compact('items'));
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
        $items = Buletin::findOrFail($id);
        $items2 = Buletin::findOrFail($id);
        $file_old = $items->file;
        $path = public_path('uploads/buletin/');

        if ($request->file('file') !== null && $request->file('file') !== '') {
            File::delete($path . $file_old);
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/buletin/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $files = $items->files;
        }
        $items2->update($request->except(['file']));

        return redirect()->route('admin.buletin.index')->withSuccess('Great! Data has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Buletin::findOrFail($id);
        $cekdel = Buletin::all();
        if($cekdel->count() <= 1){
            return redirect()->route('admin.buletin.index')->withSuccess('Tidak bisa dihapus, tabel tidak boleh kosong');
        }
        $items->delete();
        return back();
    }
}
