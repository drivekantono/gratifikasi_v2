<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use File;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = Agenda::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.agenda.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.create');
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
            $image->move(public_path('uploads/agenda'), $new_name);
            $data = array(
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi,
                'images'    => $new_name,
                'lokasi'   => $request->lokasi,
                'tanggal'   => $request->tanggal,
                'tanggal_selesai'   => $request->tanggal_selesai
            );
            Agenda::create($data);
            return redirect()->route('admin.agenda.index');
        } else {
            $data = array(
                'title'     => $request->title,
                'deskripsi' => $request->deskripsi,
                'lokasi'   => $request->lokasi,
                'tanggal'   => $request->tanggal,
                'tanggal_selesai'   => $request->tanggal_selesai
            );
            Agenda::create($data);
            return redirect()->route('admin.agenda.index')->withSuccess('Great! Image has been successfully uploaded.');
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
        $data = Agenda::findOrFail($id);
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
        $items = Agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('items'));
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
        $items = Agenda::findOrFail($id);
        $items2 = Agenda::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/agenda/');
        
        if($request->file('image') !== null && $request->file('image') !== ''){
                File::delete($path.$images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/agenda/'), $new_name);
            $items->update([
                'images' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Agenda::findOrFail($id);

        $items->delete();
        return back();
    }
}

