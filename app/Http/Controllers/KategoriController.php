<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

use Alert;
use Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        // dd($kategori);
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required|unique:kategoris',
        ];

        $message = [
            'nama_kategori.required' => 'The Category is required',
            'nama_kategori.unique' => 'Your Category can not be same',
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails())
        {
            Alert::error('Sorry your data is invalid, Please try again!', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        // $request->validate([
        //     'nama_kategori' => 'required|unique:kategoris',
        // ]);

        $kategori = new kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori, '-');
        // dd($kategori);
        $kategori->save();
        Alert::success('Data successfully saved','Good Job')->autoclose(1500);
        return redirect()->route('admin.kategori.index');
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
        return view('admin.kategori.edit', compact('kategori'));
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
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        $kategori = kategori::findOrFail($kategori->id);
        ;
        $kategori->nama_kategori = $request->nama_kategori;
        // dd($kategori);
        $kategori->save();
        Alert::success('Data Succesfully Saved','Good Job!')->autoclose(1700);
        return redirect()->route('admin.kategori.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Kategori::destroy($kategori->id)){
            Alert::error('Sorry your data is invalid, Please try again!', 'Oops!')->persistent("Ok");
            return redirect()->back();
        } else{
            Alert::success('Data successfully deleted', 'Good Job')->autoclose(1000);
            return redirect()->route('admin.kategori.index');
        }
    }
}
