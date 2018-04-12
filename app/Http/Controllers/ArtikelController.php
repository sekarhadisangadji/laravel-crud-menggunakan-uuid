<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artikel;
use Auth;

class ArtikelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ArtikelHome()
    {
        $dataArtikel = Artikel::orderBy('created_at','desc')->get();
        return view('Artikel.Home')
        ->with('dataArtikel',$dataArtikel);
    }

    public function ArtikelDelete($id_artikel, $id_user)
    {
        if(Auth::user()->id == $id_user) {
            $cekArtikel = Artikel::where('id','=',$id_artikel)->where('id_user','=',Auth::user()->id)->first();
            if(is_null($cekArtikel)) {
                return 'artikel bukan milik anda';
            } else {
                $cekArtikel->delete();
                return redirect('/artikel');
            }
        } else {
            return 'artikel bukan milik anda, permintaan tidak dapat dilanjutkan';
        }
    }

    public function ArtikelInsert(Request $request)
    {
        $insert = Artikel::create([
            'id_user' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content
        ]);
        if($insert) {
            return redirect('/artikel');
        } else {
            return 'error, terjadi kesalahan';
        }
    }

    

    // end class
}
