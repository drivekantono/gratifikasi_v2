<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\PengaduanMasyarakat;

class PengaduanMasyarakatController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $items = PengaduanMasyarakat::orderBy('created_at', 'DESC')->paginate($perPage);
        return view('admin.pengaduan_masyarakat.index', compact('items', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pengaduan_masyarakat.create');
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
            'tata_cara' => 'mimes:pdf, doc, docx,jpg,jpeg,png|max:5000',
            'formulir' => 'mimes:pdf, doc, docx,jpg,jpeg,png|max:5000',
            'rekapitulasi' => 'mimes:pdf, doc, docx,jpg,jpeg,png|max:5000'
        ]);
        
        if ($request->hasFile('tata_cara')) {
            $tata_cara = $request->file('tata_cara');
            $tata_cara_name = rand() . '.' . $tata_cara->getClientOriginalExtension();
            $tata_cara->move(public_path('uploads/pengaduan_masyarakat'), $tata_cara_name);
        }else{
        	$tata_cara_name = null;
        }

        if ($request->hasFile('formulir')) {
            $formulir = $request->file('formulir');
            $formulir_name = rand() . '.' . $formulir->getClientOriginalExtension();
            $formulir->move(public_path('uploads/pengaduan_masyarakat'), $formulir_name);
        }else{
        	$formulir_name = null;
        }

        if ($request->hasFile('rekapitulasi')) {
            $rekapitulasi = $request->file('rekapitulasi');
            $rekapitulasi_name = rand() . '.' . $rekapitulasi->getClientOriginalExtension();
            $rekapitulasi->move(public_path('uploads/pengaduan_masyarakat'), $rekapitulasi_name);
        }else{
        	$rekapitulasi_name = null;
        }
        
        $data = array(
	        		'tata_cara' => $tata_cara_name,
	                'formulir' => $formulir_name,
	                'rekapitulasi' => $rekapitulasi_name
         		);
        
        PengaduanMasyarakat::create($data);
        return redirect()->route('admin.pengaduan_masyarakat.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PengaduanMasyarakat::findOrFail($id);
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
    	$item = PengaduanMasyarakat::findOrFail($id);
        return view('admin.pengaduan_masyarakat.edit', compact('item'));
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
        $items = PengaduanMasyarakat::findOrFail($id);
        
       $request->validate([
            'tata_cara' => 'mimes:pdf, doc, docx,jpg,jpeg,png|max:5000',
            'formulir' => 'mimes:pdf, doc, docx,jpg,jpeg,png|max:5000',
            'rekapitulasi' => 'mimes:pdf, doc, docx,jpg,jpeg,png|max:5000'
        ]);
        $tata_cara_old = $items->tata_cara;
        $formulir_name_old = $items->formulir;
        $rekapitulasi_old = $items->rekapitulasi;

        $path = public_path('uploads/pengaduan_masyarakat/');

        if ($request->file('tata_cara') !== null && $request->file('tata_cara') !== '') {
            File::delete($path . $tata_cara_old);
        }
        if ($request->file('formulir') !== null && $request->file('formulir') !== '') {
            File::delete($path . $formulir_name_old);
        }
        if ($request->file('rekapitulasi') !== null && $request->file('rekapitulasi') !== '') {
            File::delete($path . $rekapitulasi_old);
        }

        if ($request->hasFile('tata_cara')) {
            $tata_cara = $request->file('tata_cara');
            $new_name = rand() . '.' . $tata_cara->getClientOriginalExtension();
            $tata_cara->move(public_path('uploads/pengaduan_masyarakat/'), $new_name);
            $items->update([
                'tata_cara' => $new_name
            ]);
        }

        if ($request->hasFile('formulir')) {
            $formulir = $request->file('formulir');
            $new_name = rand() . '.' . $formulir->getClientOriginalExtension();
            $formulir->move(public_path('uploads/pengaduan_masyarakat/'), $new_name);
            $items->update([
                'formulir' => $new_name
            ]);
        }

        if ($request->hasFile('rekapitulasi')) {
            $rekapitulasi = $request->file('rekapitulasi');
            $new_name = rand() . '.' . $rekapitulasis->getClientOriginalExtension();
            $rekapitulasi->move(public_path('uploads/pengaduan_masyarakat/'), $new_name);
            $items->update([
                'rekapitulasi' => $new_name
            ]);
        }
        return redirect()->route('admin.pengaduan_masyarakat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = PengaduanMasyarakat::findOrFail($id);

        $items->delete();
        return back();
    }
}
