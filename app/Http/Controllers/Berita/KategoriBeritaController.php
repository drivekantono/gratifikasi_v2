<?php

namespace App\Http\Controllers\Berita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KategoriBerita;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = KategoriBerita::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.kategori_berita.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = KategoriBerita::create(
            [
                'kategori_berita' => $request->kategori_berita
            ]
        );
        return redirect()->route('admin.kategori_berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Berita::findOrFail($id);
        return response()->json($items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = KategoriBerita::findOrFail($id);
        return view('admin.kategori_berita.edit', compact('items'));
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
        $items2 = KategoriBerita::findOrFail($id);
        $items2->update($request->only(['kategori_berita']));
        return redirect()->route('admin.kategori_berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = KategoriBerita::findOrFail($id);

        $items->delete();
        return back();
    }
}
