<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use File;
use Session;
use Alert;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testi = Testimoni::all();
        return view('testimoni.index',compact('testi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimoni.create');
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
            'testi' => 'required|'
            ]);
        $testi = new Testimoni;
        if ($request->File('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/gambar/testi';
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPath,$filename);
            $testi->gambar = $filename;
        }
        $testi->nama = $request->nama;
        $testi->testi = $request->testi;
        $testi->save();
        return redirect()->route('testimoni.index');
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
        $testi = Testimoni::findOrFail($id);
        return view('testimoni.edit',compact('testi'));
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
            'testi' => 'required',
        ]);
        $testi = Testimoni::findOrFail($id);
        //edit gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/gambar/testi';
            $uploadSucces = $file->move($destinationPath,$filename);

            if ($testi->gambar) {
                $old_gambar = $testi->gambar;
                $filepatch = public_path() .DIRECTORY_SEPARATOR. '/gambar/testi' .
                DIRECTORY_SEPARATOR .$testi->gambar;
                try{
                    File::delete($filepatch);
                } catch (fileNoFoundException $e){
            }
        }
        $testi->gambar =$filename;
    }
        $testi->nama = $request->nama;
        $testi->testi = $request->testi;
        $testi->save();
        return redirect()->route('testimoni.index');
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
        $testi = Testimoni::findOrFail($id);
        if ($testi->gambar) {
            $old_photo = $testi->gambar;
            $filepatch = public_path() .DIRECTORY_SEPARATOR . '/gambar/testi' . DIRECTORY_SEPARATOR .$testi->gambar;
            try{
                File::delete($filepatch);
            } catch (FileNotFoundException $e){
                
            }
        }
        $testi->delete();
        return redirect()->route('testimoni.index');
   
    }
}
