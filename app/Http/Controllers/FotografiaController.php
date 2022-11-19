<?php

namespace App\Http\Controllers;

use App\Models\Fotografia;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FotografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */  
    public function listarfotografias(){
       // $fots = Fotografia::all();
       $fots = Http::get('http://whitecityApi.test/v1/fotografias');
       $fotoArray = $fots->json();
        return view('fotografias.listarfotografias')->with('fotoArray',$fotoArray);
     }

    public function index()
    {
       $fots = Http::get('http://whitecityApi.test/v1/fotografias/');
       $fotoArray = $fots->json();
       return view('fotografias.index', compact('fotoArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('fotografias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/fotografias',$request->all());

        //  $fots = new Fotografia();
        // $fots->nombre = $request->get('nombre');
        // $fots->descripcion = $request->get('descripcion');


        // $file=$request->file('imagen');
        //  $nombreArchivo = "img_".time().".".$file->guessClientExtension();
        //  $request->file('imagen')->storeAs('public/image', $nombreArchivo );
        // $fots->imagen = $nombreArchivo;

        //  $fots->save();

        return redirect('/listarfotografias');
    
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
        $fots = Http::get('http://whitecityApi.test/v1/fotografias/'.$id);
        $fotoArray = $fots->json();
        return view('fotografias.edit')->with('fotoArray', $fotoArray);
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
      $fotoArray = Http::put('http://whitecityApi.test/v1/fotografias/'.$id, $request->all());

       return redirect('/listarfotografias')->with('fotoArray', $fotoArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/fotografias/'.$id);
       
        return redirect('/listarfotografias');
    }

    public function generar_pdf(){
        $fots = Fotografia::all();
        $pdf = PDF::loadView('fotografias.fotografias_pdf', compact('fots'));  
        return $pdf->stream('listado_fotografias.pdf');
    }
}

