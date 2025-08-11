<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeri;
use App\KategoriGaleri;

class GaleriController extends Controller
{
	public function index()
	{
		parent::trackers('galeri');
		$perPage = 9;
	    $items = Galeri::orderBy('created_at', 'DESC')->paginate($perPage);
	    $cat1 = Galeri::where('id_kategori', 1)->orderBy('created_at', 'DESC')->get();
	    $cat2 = Galeri::where('id_kategori', 2)->orderBy('created_at', 'DESC')->get();
	    $cat3 = Galeri::where('id_kategori', 3)->orderBy('created_at', 'DESC')->get();
	    $cat4 = Galeri::where('id_kategori', 4)->orderBy('created_at', 'DESC')->get();
	    $cat5 = Galeri::where('id_kategori', 5)->orderBy('created_at', 'DESC')->get();
	    $listcat = KategoriGaleri::all();

	    return view('frontend.galeri.index', compact('cat1', 'cat2', 'cat3', 'cat4', 'cat5', 'items' ,'perPage', 'listcat'));	
	    
	}

	public function filter(Request $req)
	{

		switch ($req->kategori) {
			case 1:
				$perPage = 9;
				$items = Galeri::where('id_kategori', 1)->orderBy('created_at', 'DESC')->paginate($perPage);
				$listcat = KategoriGaleri::all();
				return view('frontend.galeri.index', compact('items','perPage', 'listcat'));
				break;

			case 2:
				$perPage = 9;
				$items = Galeri::where('id_kategori', 2)->orderBy('created_at', 'DESC')->paginate($perPage);
				$listcat = KategoriGaleri::all();
				return view('frontend.galeri.index', compact('items','perPage', 'listcat'));
				break;

			case 3:
				$perPage = 9;
				$items = Galeri::where('id_kategori', 3)->orderBy('created_at', 'DESC')->paginate($perPage);
				$listcat = KategoriGaleri::all();
				return view('frontend.galeri.index', compact('items','perPage', 'listcat'));
				break;

			case 4:
				$perPage = 9;
				$items = Galeri::where('id_kategori', 4)->orderBy('created_at', 'DESC')->paginate($perPage);
				$listcat = KategoriGaleri::all();
				return view('frontend.galeri.index', compact('items','perPage', 'listcat'));
				break;
			case 5:
				$perPage = 9;
				$items = Galeri::where('id_kategori', 5)->orderBy('created_at', 'DESC')->paginate($perPage);
				$listcat = KategoriGaleri::all();
				return view('frontend.galeri.index', compact('items','perPage', 'listcat'));
				break;
			case 0:
				return redirect()->route('frontend.galeri.index');
				break;
		}
		
	}
}
