<?php

namespace App\Http\Controllers;

use App\DataStatistika;
use Illuminate\Http\Request;
use File;

class DataStatistikaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = DataStatistika::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.data_statistika.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_statistika.create');
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
            $image->move(public_path('uploads/data_statistika'), $new_name);
            $data = array(
                'title'     => $request->title,
                'tahun' => $request->tahun,
                'file'    => $new_name,

            );
            DataStatistika::create($data);
            return redirect()->route('admin.data_statistika.index');
        } else {
            $data = array(
                'title'     => $request->title,
                'tahun' => $request->tahun
            );
            DataStatistika::create($data);
            return redirect()->route('admin.data_statistika.index')->withSuccess('Great! Data has been successfully uploaded.');
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
        $data = DataStatistika::findOrFail($id);
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
        $items = DataStatistika::findOrFail($id);
        return view('admin.data_statistika.edit', compact('items'));
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
            'image' => 'mimes:doc, docx, pdf|max:5000'
        ]);
        $items = DataStatistika::findOrFail($id);
        $items2 = DataStatistika::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/data_statistika/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/data_statistika/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.data_statistika.index')->withSuccess('Great! Data has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = DataStatistika::findOrFail($id);

        $items->delete();
        return back();
    }
}
