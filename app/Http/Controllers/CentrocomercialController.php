<?php

namespace App\Http\Controllers;

use App\Models\Ccomercial;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class CentrocomercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarcentroscomerciales(){
        $comercs = Http::get('http://whitecityApi.test/v1/centroscomerciales/');
        $ccomercialArray = $comercs->json();
        return view('centroscomerciales.listarcentroscomerciales')->with('ccomercialArray',$ccomercialArray);
     }

    public function index()
    {
        $comercs = Http::get('http://whitecityApi.test/v1/centroscomerciales/');
        $ccomercialArray = $comercs->json();
        return view('centroscomerciales.index', compact('ccomercialArray'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centroscomerciales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/centroscomerciales',$request->all());

        return redirect('/listarcentroscomerciales');
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
        $comerc = Http::get('http://whitecityApi.test/v1/centroscomerciales/'.$id);
        $ccomercialArray = $comerc->json();
        return view('centroscomerciales.edit')->with('ccomercialArray', $ccomercialArray);
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

        $ccomercialArray = Http::put('http://whitecityApi.test/v1/centroscomerciales/'.$id, $request->all());
        // $comerc=  Http::put('http://whitecityApi.test/v1/centroscomerciales/'.$id);
        // $ccomercialArray = $comerc->json();

        return redirect('/listarcentroscomerciales')->with('ccomercialArray', $ccomercialArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/centroscomerciales/'.$id);
   
        return redirect('/listarcentroscomerciales');
    }

    public function generar_pdf(){
        $comercs = Ccomercial::all();
        $pdf = PDF::loadView('centroscomerciales.centroscomerciales_pdf', compact('comercs'));  
        return $pdf->stream('registro_centroscomerciales.pdf');
    }
}
