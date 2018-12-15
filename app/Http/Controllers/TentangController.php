<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tentang;
use File;
use Session;
use Alert;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Tentang::all();
        return view('tentang.index',compact('t'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tentang.create');
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
            'judul' => 'required|',
            'deskripsi' => 'required|'
            ]);
        $t = new Tentang;
        $t->judul = $request->judul;
        $t->deskripsi = $request->deskripsi;
        $t->save();
        return redirect()->route('tentang.index');
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
        $t = Tentang::findOrFail($id);
        return view('tentang.edit',compact('t'));

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
            'judul' => 'required',
            'deskripsi' => 'required' 
        ]);
        $t = Tentang::findOrFail($id);
        $t->judul = $request->judul;
        $t->deskripsi = $request->deskripsi;
        $t->save();
        return redirect()->route('tentang.index');
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
        $t = Tentang::findOrFail($id);
        $t->delete();
        return redirect()->route('tentang.index');
    }
}
