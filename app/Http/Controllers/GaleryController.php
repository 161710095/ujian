<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;
use File;
use Session;
use Alert;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $g = Galery::all();
        return view('galery.index',compact('g'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galery.create');
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
            'nama' => 'required|',
            'deskripsi' => 'required|'
            ]);
        $g = new Galery;
        if ($request->File('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/gambar/galery';
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPath,$filename);
            $g->gambar = $filename;
        }
        $g->nama = $request->nama;
        $g->deskripsi = $request->deskripsi;
        $g->save();
        return redirect()->route('galery.index');
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
        $g = Galery::findOrFail($id);
        return view('galery.edit',compact('g'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $g = Galery::findOrFail($id);
        //edit gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/gambar/galery';
            $uploadSucces = $file->move($destinationPath,$filename);

            if ($g->gambar) {
                $old_gambar = $g->gambar;
                $filepatch = public_path() .DIRECTORY_SEPARATOR. '/gambar/galery' .
                DIRECTORY_SEPARATOR .$g->gambar;
                try{
                    File::delete($filepatch);
                } catch (fileNoFoundException $e){
            }
        }
        $g->gambar =$filename;
    }
        $g->nama = $request->nama;
        $g->deskripsi = $request->deskripsi;
        $g->save();
        return redirect()->route('galery.index');
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
        $g = Galery::findOrFail($id);
        if ($g->gambar) {
            $old_photo = $g->gambar;
            $filepatch = public_path() .DIRECTORY_SEPARATOR . '/gambar/galery' . DIRECTORY_SEPARATOR .$g->gambar;
            try{
                File::delete($filepatch);
            } catch (FileNotFoundException $e){
                
            }
        }
        $g->delete();
        return redirect()->route('galery.index');
    }
}
