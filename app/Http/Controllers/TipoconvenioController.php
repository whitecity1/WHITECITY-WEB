<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TipoconvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoconvenios = Http::get('http://whitecityApi.test/v1/tipoconvenios/');
        $tipoconvenioArray = $tipoconvenios->json();
        return view('tipoconvenio.index')->with('tipoconvenioArray', $tipoconvenioArray); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoconvenio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/tipoconvenios',$request->all());

        return redirect('/tipoconvenio');
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
        $tipoconvenio = Http::post('http://whitecityApi.test/v1/tipoconvenios/'.$id);
        $tipoconvenioArray = $tipoconvenio->json();
        return view('tipoconvenio.edit')->with('tipoconvenioArray', $tipoconvenioArray);
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

        $tipoconvenio = Http::post('http://whitecityApi.test/v1/tipoconvenios/'.$id);
        $tipoconvenioArray = $tipoconvenio->json();

        return redirect('/tipoconvenio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/tipoconvenios/'.$id);
        return redirect('/tipoconvenio');
    }

    //Falta generar el pdf 
}
