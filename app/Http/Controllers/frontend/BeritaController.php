<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Berita;
use App\KategoriBerita;
use App\Aspirasi;
class BeritaController extends Controller
{
	public function index()
	{	
        parent::trackers('berita');
        $perPage = 5;
        $beritaTerakhir = Berita::orderBy('created_at', 'DESC')->take(3)->get();
        $artikel = Berita::where('id_kategori',1)->orderBy('created_at', 'DESC')->take(3)->get();
        $kategoriberita = KategoriBerita::get();
		$items = Berita::orderBy('created_at', 'DESC')->paginate($perPage);
		return view('frontend.berita.index', compact('items', 'perPage','artikel','beritaTerakhir', 'kategoriberita'));
	}
    public function show($id)
    {	
        $perPage = 10;
        $beritaTerakhir = Berita::orderBy('created_at', 'DESC')->take(3)->get();
        $artikel = Berita::where('id_kategori',1)->orderBy('created_at', 'DESC')->take(3)->get();
    	$item = Berita::where('id', $id)->first();
        $kategoriberita = KategoriBerita::get();
        $asps = Aspirasi::where('publikasi', 1)->orderBy('created_at', 'ASC')->take(5)->get();
    	return view('frontend.berita.content', compact('item', 'artikel','beritaTerakhir','kategoriberita', 'asps'));
    }
    public function bycategory($id)
    {        
        $perPage = 10;
        $beritaTerakhir = Berita::orderBy('created_at', 'DESC')->take(3)->get();
        $artikel = Berita::where('id_kategori',1)->orderBy('created_at', 'DESC')->take(3)->get();
        $items = Berita::where('id_kategori', $id)->paginate($perPage);
        $kategoriberita = KategoriBerita::get();
    	return view('frontend.berita.index', compact('items', 'perPage', 'artikel','beritaTerakhir','kategoriberita'));
    }
}
