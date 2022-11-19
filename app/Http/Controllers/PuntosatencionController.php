<?php

namespace App\Http\Controllers;

use App\Models\Puntosatencion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;   //Para generar PDF
use Illuminate\Support\Facades\Http;  //Para acceder a la api

class PuntosatencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarpuntosatencion(){
        $puntos = Http::get('http://whitecityApi.test/v1/puntosatencion/');
        $puntosArray = $puntos->json();
        return view('puntosatencion.listarpuntosatencion')->with('puntosArray',$puntosArray);
     }
    public function index()
    {
        $puntos = Http::get('http://whitecityApi.test/v1/puntosatencion/');
        $puntosArray = $puntos->json();
        return view('puntosatencion.index', compact('puntosArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $punto=Puntosatencion::all();
        return view('puntosatencion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/puntosatencion/',$request->all());

        return redirect('/listarpuntosatencion');
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
    {     $puntos = Http::get('http://whitecityApi.test/v1/puntosatencion/'.$id);
        $puntosArray = $puntos->json();

        return view('puntosatencion.edit')->with('puntosArray', $puntosArray);
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
        $puntosArray = Http::put('http://whitecityApi.test/v1/puntosatencion'.$id, $request->all());
       
        return redirect('/listarpuntosatencion')->with('puntosArray', $puntosArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/puntosatencion/'.$id);
     
        return redirect('/listarpuntosatencion');
    }

    public function generar_pdf(){
        $puntos = Puntosatencion::all();
        $pdf =PDF::loadView('puntosatencion.puntosatencion_pdf', compact('puntos'));
        return $pdf->Stream('registro_puntosatencion.pdf'); //Para direccionar al navegador
     }
}
