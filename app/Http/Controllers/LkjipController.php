<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lkjip;
class LkjipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        
        $perPage = 10;
        
        $items = Lkjip::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.lkjip.index', compact('items', 'perPage'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lkjip.create');
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
            $image->move(public_path('uploads/lkjip'), $new_name);
            $data = array(
                'title'     => $request->title,
                'tahun' => $request->tahun,
                'file'    => $new_name
            );
            Lkjip::create($data);
            return redirect()->route('admin.lkjip.index');
        } else {
            $data = array(
                'title'     => $request->title,
                'tahun' => $request->tahun
            );
            Lkjip::create($data);
            return redirect()->route('admin.lkjip.index');
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
        $data = Lkjip::findOrFail($id);
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
        $items = Lkjip::findOrFail($id);
        return view('admin.lkjip.edit', compact('items'));
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
    
        $items = Lkjip::findOrFail($id);
        $items2 = Lkjip::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/lkjip/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            File::delete($path . $images_old);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/lkjip/'), $new_name);
            $items->update([
                'file' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.lkjip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Lkjip::findOrFail($id);
        $items->delete();
        return back();
    }
}
