<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kontak;
use File;
use Session;
use Alert;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::all();
        return view('kontak.index',compact('kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak.create');
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
            'telepon' => 'required|',
            'email' => 'required|',
            'alamat' => 'required|'
            ]);
        $kontak = new Kontak;
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->alamat = $request->alamat;
        $kontak->save();
        return redirect()->route('kontak.index');
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
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit',compact('kontak'));

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
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required' 
        ]);
        $kontak = Kontak::findOrFail($id);
        $kontak->telepon = $request->telepon;
        $kontak->email = $request->email;
        $kontak->alamat = $request->alamat;    
        $kontak->save();
        return redirect()->route('kontak.index');
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
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();
        return redirect()->route('Kontak.index');
    }
}
