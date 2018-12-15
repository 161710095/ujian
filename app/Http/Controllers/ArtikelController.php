<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use File;
use Session;
use Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Artikel::all();
        return view('artikel.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
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
        $this->validate($request,[
            'gambar' => 'required|',
            'judul' => 'required|',
            'isi' => 'required|'
            ]);
        $a = new Artikel;
        if ($request->File('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/gambar/artikel';
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPath,$filename);
            $a->gambar = $filename;
        }
        $a->judul = $request->judul;
        $a->isi = $request->isi;
        $a->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Artikel::findOrFail($id);
        return view('artikel.edit',compact('a'));
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
        $this->validate($request,[
            'gambar' => 'required|',
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $a = Artikel::findOrFail($id);
        //edit gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/gambar/artikel';
            $uploadSucces = $file->move($destinationPath,$filename);

            if ($a->gambar) {
                $old_gambar = $a->gambar;
                $filepatch = public_path() .DIRECTORY_SEPARATOR. '/gambar/artikel' .
                DIRECTORY_SEPARATOR .$a->gambar;
                try{
                    File::delete($filepatch);
                } catch (fileNoFoundException $e){
            }
        }
        $a->gambar =$filename;
    }
        $a->judul = $request->judul;
        $a->isi = $request->isi;
        $a->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        Alert::success('Data Succesfully Deleted','Good Job!')->autoclose(1700);
        $a = Artikel::findOrFail($id);
        if ($a->gambar) {
            $old_photo = $a->gambar;
            $filepatch = public_path() .DIRECTORY_SEPARATOR . '/gambar/artikel' . DIRECTORY_SEPARATOR .$a->gambar;
            try{
                File::delete($filepatch);
            } catch (FileNotFoundException $e){
                
            }
        }
        $a->delete();
        return redirect()->route('artikel.index');
    }
}
