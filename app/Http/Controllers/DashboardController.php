<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\KategoriBerita;
use App\Galeri;
use App\LinkLayanan;
use App\Slider;
use App\Agenda;
use App\ContactUs;
use App\ObjekWisataAlam;
class DashboardController extends Controller
{
    public function dashboard()
    {
        parent::trackers('dashboard');
        $slider = Slider::where('status', 'aktif')->get();
        $agenda = Agenda::all();
        $artikel = Berita::where('id_kategori', '1')->orderBy('created_at', 'DESC')->take(4)->get();
        $berita = Berita::orderBy('created_at', 'DESC')->take(6)->get();
        $link_layanan = LinkLayanan::all();
        $galeri = Galeri::where('status', 'aktif')->orderBy('created_at', 'ASC')->take(6)->get();
        

        return view('welcome', compact('slider','agenda','artikel','berita', 'link_layanan', 'galeri'));
    }
}
