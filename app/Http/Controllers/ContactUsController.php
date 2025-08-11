<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use File;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = ContactUs::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.contact_us.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_us.create');
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

            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image2 = $request->file('image2');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $image->move(public_path('uploads/contact'), $new_name);
            $image2->move(public_path('uploads/contact'), $new_name2);
            $data = array(
                'tile'      => $request->title,
                'deskripsi' => $request->deskripsi,
                'tlp'    => $request->tlp,
                'fax'    => $request->fax,
                'logo1'    => $new_name,
                'logo2'    => $new_name2,
                'email'    => $request->email,
                'facebook'    => $request->facebook,
                'twitter'    => $request->twitter,
                'youtube'    => $request->youtube,
                'instagram'    => $request->instagram
            );
            ContactUs::create($data);
            return redirect()->route('admin.contact_us.index');
        } else {
            $data = array(
                'tile'      => $request->title,
                'deskripsi' => $request->deskripsi,
                'tlp'    => $request->tlp,
                'fax'    => $request->fax,
                'email'    => $request->email,
                'facebook'    => $request->facebook,
                'twitter'    => $request->twitter,
                'youtube'    => $request->youtube,
                'instagram'    => $request->instagram
            );
            ContactUs::create($data);
            return redirect()->route('admin.contact_us.index');
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
        $data = ContactUs::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //dibuat langsung edit
        $items = ContactUs::orderBy('created_at', 'ASC')->first();
        return view('admin.contact_us.edit', compact('items'));
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
        $items = ContactUs::findOrFail($id);
        $items2 = ContactUs::findOrFail($id);
        $images_old = $items->logo1;
        $images_old2 = $items2->logo2;
        $path = public_path('uploads/contact_us/');

        if ($request->file('image') !== null && $request->file('image') !== '' || $request->file('image2') !== null && $request->file('image2') !== '') {
            File::delete($path . $images_old);
            File::delete($path . $images_old2);
        }
        if ($request->hasFile('image') || $request->hasFile('image2')) {
            $images = $request->file('image');
            $images2 = $request->file('image2');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $new_name2 = rand() . '.' . $images2->getClientOriginalExtension();
            $images->move(public_path('uploads/contact_us/'), $new_name);
            $images2->move(public_path('uploads/contact_us/'), $new_name2);
            $items->update([
                'logo1' => $new_name,
                'logo2' => $new_name2
            ]);
        } else {
            $images = $items->logo1;
            $images2 = $items->logo2;
        }
        $items2->update($request->except(['image', 'image2']));
        return redirect()->route('admin.contact_us.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = ContactUs::findOrFail($id);

        $items->delete();
        return back();
    }
}
