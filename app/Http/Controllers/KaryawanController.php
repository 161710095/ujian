<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use File;
use Session;
use Alert;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $k = Karyawan::all();
        return view('karyawan.index',compact('k'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'foto' => 'required|',
            'nama' => 'required|',
            'jabatan' => 'required|'
            ]);
        $k = new Karyawan;
        if ($request->File('foto')) {
            $file = $request->file('foto');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/foto/karyawan';
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPath,$filename);
            $k->foto = $filename;
        }
        $k->nama = $request->nama;
        $k->jabatan = $request->jabatan;
        $k->save();
        return redirect()->route('karyawan.index');
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
        $k = Karyawan::findOrFail($id);
        return view('karyawan.edit',compact('k'));
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
            'foto' => 'required|',
            'nama' => 'required',
            'jabatan' => 'required' 
        ]);
        $k = Karyawan::findOrFail($id);
        //edit foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = str_random(6). '_' . $file->getClientOriginalName();
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. '/foto/karyawan';
            $uploadSucces = $file->move($destinationPath,$filename);

            if ($k->foto) {
                $old_foto = $k->foto;
                $filepatch = public_path() .DIRECTORY_SEPARATOR. '/foto/karyawan' .
                DIRECTORY_SEPARATOR .$k->foto;
                try{
                    File::delete($filepatch);
                } catch (fileNoFoundException $e){
            }
        }
        $k->foto =$filename;
    }
        $k->nama = $request->nama;
        $k->jabatan = $request->jabatan;
        $k->save();
        return redirect()->route('karyawan.index');
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
        $k = Karyawan::findOrFail($id);
        if ($k->foto) {
            $old_photo = $k->foto;
            $filepatch = public_path() .DIRECTORY_SEPARATOR . '/foto/karyawan' . DIRECTORY_SEPARATOR .$k->foto;
            try{
                File::delete($filepatch);
            } catch (FileNotFoundException $e){
                
            }
        }
        $k->delete();
        return redirect()->route('karyawan.index');
    }
}
