<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estacion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class EstacionservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listarestacioneservicio(){
        $estaciones = Http::get('http://whitecityApi.test/v1/estaciones/');
        $estacionArray = $estaciones->json();
        return view('estacioneservicio.listarestacioneservicio')->with('estacionArray',$estacionArray);
     }

    public function index()
    {
        $estacions = Http::get('http://whitecityApi.test/v1/estaciones/');
        $estacionArray = $estacions->json();
        return view('estacioneservicio.index', compact('estacionArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estacioneservicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        Http::post('http://whitecityApi.test/v1/estaciones',$request->all());

        return redirect('/listarestacioneservicio');
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
        $estacion = Http::get('http://whitecityApi.test/v1/estaciones/'.$id);
        $estacionArray = $estacion->json();
        return view('estacioneservicio.edit')->with('estacionArray', $estacionArray);
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
        
        $estacion = Http::put('http://whitecityApi.test/v1/estaciones/'.$id);
        $estacionArray = $estacion->json();

        return redirect('/listarestacioneservicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/estaciones/'.$id);
      
         return redirect('/listarestacioneservicio');
    }

    public function generar_pdf(){
        $estaciones = Estacion::all();
        $pdf =PDF::loadView('estacioneservicio.estacioneservicio_pdf', compact('estaciones'));
        return $pdf->Stream('estacioneservicio_registradas.pdf'); //Para direccionar al navegador
     }
}
