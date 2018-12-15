<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use App\Artikel;
use App\Tentang;
use App\Karyawan;
use App\Galery;
use App\Kontak;
use App\Testimoni;

class FrontendController extends Controller
{
    public function index ()
    {
    	return view('frontend.index');
    }

    public function barang()
    {
        $kategori = Barang::all();
        return view('frontend.index',compact('kategori'));
    }
    public function filter_barangs($id)
    {
        $kategori = Barang::where('kategori_id','=',$id)->get();
        return view('frontend.index', compact('kategori'));
    }
    public function single(Artikel $artikel)
    {
    
    return view('frontend.single',compact('artikel'));
    }
    public function detail(Barang $barang)
    {
    
    return view('frontend.detail',compact('barang'));
    }
    public function barangkategori(Kategori $kategori)
    {
        $barang = $kategori->Barang()->latest()->paginate(4);
        return view('frontend.gallery', compact('barang'));
    }
}
