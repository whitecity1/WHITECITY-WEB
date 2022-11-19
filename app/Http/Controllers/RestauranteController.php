<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use  PDF;
use Illuminate\Support\Facades\Http;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listarestaurantes(){
        $restaurantes = Http::get('http://whitecityApi.test/v1/restaurantes/');
        $restaurantesArray = $restaurantes->json();
        return view('restaurantes.listarestaurantes')->with('restaurantesArray',$restaurantesArray);
     }

    public function index()
    {
        $restaurantes =Http::get('http://whitecityApi.test/v1/restaurantes/');
        $restaurantesArray = $restaurantes->json();
        return view('restaurantes.index', compact('restaurantesArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/restaurantes',$request->all());
        // $restaurantes->id = $request->get('id'); 
        // $restaurantes->restaurante = $request->get('restaurante');
        // $restaurantes->telefono = $request->get('telefono');
        // $restaurantes->correo= $request->get('correo');
        // $restaurantes->mun_ubicado = $request->get('mun_ubicado');
        // $restaurantes->direccion = $request->get('direccion');
        // $restaurantes->apertura = $request->get('apertura');
        // $restaurantes->cierre = $request->get('cierre');

          
        // $file=$request->file('imagen');
        // $nombreArchivo = "img_".time().".".$file->guessClientExtension();
        // $request->file('imagen')->storeAs('public/image', $nombreArchivo );
        // $restaurantes->imagen = $nombreArchivo;

          
        // $restaurantes->save();

        return redirect('/listarestaurantes');
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
        $restaurante = Http::get('http://whitecityApi.test/v1/restaurantes/'.$id);
        $restaurantesArray = $restaurante->json();
        return view('restaurantes.edit')->with('restaurantesArray', $restaurantesArray);
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
        $restaurantesArray = Http::put('http://whitecityApi.test/v1/restaurantes/'.$id, $request->all());

        return redirect('/listarestaurantes')->with('restaurantesArray', $restaurantesArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/restaurantes/'.$id);
   
        return redirect('/listarestaurantes');
    }

    public function generar_pdf(){
        $restaurantes = Restaurante::all();
           $pdf =PDF::loadView('restaurantes.restaurantes_pdf', compact('restaurantes'));
        return $pdf->Stream('restaurantes_registrados.pdf'); //Para direccionar al navegador
        }
}
