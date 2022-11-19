<?php

namespace App\Http\Controllers;

use App\Models\Autoridad;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class AutoridadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarautoridades(){
        $autoridades = Http::get('http://whitecityApi.test/v1/autoridades/');
        $autoridadesArray = $autoridades->json();
        return view('autoridades.listarautoridades')->with('autoridadesArray',$autoridadesArray);
     }
     
    public function index()
    {
        $autoridades = Http::get('http://whitecityApi.test/v1/autoridades/');
        $autoridadesArray = $autoridades->json();
        return view('autoridades.index', compact('autoridadesArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autoridades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/autoridades',$request->all());

        return redirect('/listarautoridades');
    }

    /**8
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
        $autoridades = Http::get('http://whitecityApi.test/v1/autoridades/' .$id);
        $autoridadesArray = $autoridades->json();
        return view('autoridades.edit')->with('autoridadesArray', $autoridadesArray);
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
        $autoridadesArray = Http::put('http://whitecityApi.test/v1/autoridades/'.$id, $request->all());

        return redirect('/listarautoridades')->with('autoridadesArray', $autoridadesArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Http::delete('http://whitecityApi.test/v1/autoridades/'.$id);
        
        return redirect('/listarautoridades');
    }

    public function generar_pdf(){
        $autoridades = Autoridad::all();
        $pdf = PDF::loadView('autoridades.autoridades_pdf', compact('autoridades'));  
        return $pdf->stream('registro_autoridades.pdf');
    }
}
