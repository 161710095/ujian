<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use App\Kategori;
use File;
use Auth;
use Session;
// use App\Role;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $barang = Barang::all();
        } elseif ($user->hasRole('member')) {
            $barang = Auth::user()->Barang;
        }
        // dd($barang);
        return view('admin.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Data Succesfully Saved','Good Job!')->autoclose(1700);
        $user = Auth::user()->id;
        $barang = new Barang;
        $barang->merk = $request->merk;
        $barang->model = $request->model;
        $barang->deskripsi = $request->deskripsi;
        $barang->slug =str_slug($request->model, '-');
        $barang->kategori_id = $request->kategori_id;
        $barang->user_id = $user;
        // $barang->publish = $request->publish;
        // upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'/gambar/barang';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $barang->gambar = $filename;
        }
        $barang->save();
        return redirect()->route('admin.barang.index');
    }

    public function Publish($id)
    {
        $barang = Barang::find($id);

        if ($barang->status === 1) {
            $barang->status = 0;
            Alert::success('Data successfully unpublished', 'Good Job')->autoclose(1000);
        } else {
            $barang->status= 1;
            Alert::success('Data successfully published', 'Good Job')->autoclose(1000);
        }

        $barang->save();
        return redirect()->route('admin.barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.barang.edit', compact('barang', 'kategori'));
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
        Alert::success('Data Succesfully Changed','Good Job!')->autoclose(1700);
        $barang = Barang::findOrFail($id);
        $barang->merk = $request->merk;
        $barang->model = $request->model;
        $barang->deskripsi = $request->deskripsi;
        $barang->slug =str_slug($request->model, '-');
        $barang->kategori_id = $request->kategori_id;
        // $barang->publish = $request->publish;

        // edit upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/gambar/barang';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            // hapus gambar lama, jika ada
            if ($barang->gambar) {
                $old_gambar = $barang->gambar;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/gambar/barang'
        . DIRECTORY_SEPARATOR . $barang->gambar;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }   
            }
            $barang->gambar = $filename;
        }

        $barang->save();
        // dd($barang);
        return redirect()->route('admin.barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->gambar) {
            $old_gambar = $barang->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . '/gambar/barang'
            . DIRECTORY_SEPARATOR . $barang->gambar;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        $barang->delete();
        Alert::success('Data Succesfully Deleted','Good Job!')->autoclose(1700);   
        return redirect()->route('admin.barang.index');
    }
}
