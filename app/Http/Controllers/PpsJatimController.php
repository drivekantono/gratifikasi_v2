<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PpsJatim;

class PpsJatimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = PpsJatim::orderBy('created_at', 'ASC')->paginate($perPage);
        return view('admin.pps_jatim.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pps_jatim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        PpsJatim::create($data);
        return redirect()->route('admin.pps_jatim.index')->withSuccess('Great! Data has been successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PpsJatim::findOrFail($id);
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
        //dibuat langsung edit
        //$items = PpsJatim::orderBy('created_at', 'ASC')->first();
        $items = PpsJatim::findOrFail($id);
        return view('admin.pps_jatim.edit', compact('items'));
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
        $requestData = $request->all();
        $item = PpsJatim::findOrFail($id);
        $item->update($requestData);

        return redirect()->route('admin.pps_jatim.index')->withSuccess('Great! Data has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = PpsJatim::findOrFail($id);

        $items->delete();
        return back();
    }
}
