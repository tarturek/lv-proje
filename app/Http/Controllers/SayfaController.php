<?php

namespace App\Http\Controllers;

use App\Sayfa;
use Illuminate\Http\Request;

class SayfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sayfalar = Sayfa::all();
        return view('admin.sayfalar.index',compact('sayfalar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sayfalar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),array(
        'baslik'=>'required',
	    'icerik'=>'required',

        ));

        $sayfa = new Sayfa();
        $sayfa->baslik = request('baslik');
        $sayfa->icerik = request('icerik');
        $sayfa->slug = str_slug(request('baslik'));
        $sayfa->save();

	    if ($sayfa) {

            alert()
                ->success('Başarılı', 'Sayfa Eklendi')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'SAyfa Eklenemedi')
                ->autoClose(2000);
		    return back();

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
        $sayfa = Sayfa::find($id);
        return view('admin.sayfalar.edit',compact('sayfa'));
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

	    $this->validate(request(),array(
		    'baslik'=>'required',
		    'icerik'=>'required',

	    ));

	    $sayfa = Sayfa::find($id);
	    $sayfa->baslik = request('baslik');
	    $sayfa->icerik = request('icerik');
	    $sayfa->slug = str_slug(request('baslik'));
	    $sayfa->save();

	    if ($sayfa) {

            alert()
                ->success('Başarılı', 'SAyfa Güncellendi')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'SAyfa Güncellenemedi')
                ->autoClose(2000);
		    return back();

	    }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sil = Sayfa::destroy($id);
	    if ($sil) {

            alert()
                ->success('Başarılı', 'SAyfa Silindi')
                ->autoClose(2000);
		    return back();

	    } else {
            alert()
                ->error('Hata', 'SAyfa Silinemedi')
                ->autoClose(2000);
		    return back();

	    }
    }
}
