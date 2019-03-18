<?php

namespace App\Http\Controllers;

use App\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resimler = Galeri::all();
        return view('admin.galeri.index',compact('resimler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $resimler = $request->file([]);

     foreach($resimler as $resim) {

     $uzanti = $resim->getClientOriginalExtension();
     $uret = str_random(10);
     $dosya = $uret.'.'.$uzanti;
     $dizin = 'uploads/galeri';
     $resimyol = $dizin.'/'.$dosya;
     $resim->move($dizin,$dosya);
        Galeri::create([
       'baslik'=>$dosya,
       'resim'=>$resimyol,
        ]);

     }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $resim = Galeri::find($id);
     $resimyolu = $resim->resim;
     if(file_exists($resimyolu)) {

     $resimsil = unlink(public_path().'/'.$resimyolu);

     }

    Galeri::destroy($id);
        alert()
            ->success('Başarılı', 'Resim Silindi')
            ->autoClose(2000);
        return redirect()->route('galeri.index');

    }


}
