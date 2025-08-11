<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StrukturOrganisasi2;
use File;

class StrukturOrganisasi2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = StrukturOrganisasi2::all();
        return view('admin.struktur_organisasiv2.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = StrukturOrganisasi2::all();
        return view('admin.struktur_organisasiv2.create',compact('items'));
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
            'image.*' => 'image|mimes:jpg,png,jpeg|max:5000'
        ]);
        $items = StrukturOrganisasi2::all();
        if($request->hasFile('images')){
            $image = $request->file('images');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/struktur_organisasi'), $new_name);
            if($request->tags == 1){
                $tag = "assistant";
            }else{
                $tag = null;
            }
            $data = array(
                'title' => $request->title,
                'nama'  => $request->nama,
                'images'=> $new_name,
                'tags' => $request->tags,
                'parent_id' => $request->parent_id
            );

            StrukturOrganisasi2::create($data);
            
        }else{
            $defimg = asset('uploads/struktur_organisasi/defimage.png');
            if($request->tags == 1){
                $tag = "assistant";
            }else{
                $tag = null;
            }
             $data = array(
                'title' => $request->title,
                'nama'  => $request->nama,
                'images' => 'defimage.png',
                'tags' => $request->tags,
                'parent_id' => $request->parent_id
            );
            StrukturOrganisasi2::create($data);
           
        }

        return redirect()->route('admin.struktur_organisasi2.index',compact($items));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $perPage = 10;
        $items = StrukturOrganisasi2::orderBy('created_at', 'DESC')->paginate($perPage);

        return view('admin.struktur_organisasiv2.show', compact('items', 'perPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $items = StrukturOrganisasi2::findOrFail($id);
        
        $datas = StrukturOrganisasi2::all();
        if($items != null){
            $selected = StrukturOrganisasi2::where('id' , $items->parent_id)->first();
        }
        
        return view('admin.struktur_organisasiv2.edit', compact('items', 'datas', 'selected'));
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
            'image.*' => 'image|mimes:jpg,png,jpeg|max:5000'
        ]);
        $items = StrukturOrganisasi2::findOrFail($id);
        $items2 = StrukturOrganisasi2::findOrFail($id);
        $images_old = $items->images;
        $path = public_path('uploads/struktur_organisasi/');

        if ($request->file('image') !== null && $request->file('image') !== '') {
            if ($images_old != 'defimage.png') {
                File::delete($path . $images_old);
            }
        }
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('uploads/struktur_organisasi/'), $new_name);
            $items->update([
                'images' => $new_name
            ]);
        } else {
            $images = $items->images;
        }
        $items2->update($request->except(['image']));
        return redirect()->route('admin.struktur_organisasi2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = StrukturOrganisasi2::findOrFail($id);

        $items->delete();
        return back();
    }
}
