<?php

namespace App\Http\Controllers;

use App\Models\Rutas_Turistica;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class RutaturisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarutasturisticas(){
        $rutasturcs = Http::get('http://whitecityApi.test/v1/rutasturisticas/');
        $rutasturisticasArray = $rutasturcs->json();
        return view('rutasturisticas.listarutasturisticas')->with('rutasturisticasArray',$rutasturisticasArray);

     }
    public function index()
    {
        $rutasturcs = Http::get('http://whitecityApi.test/v1/rutasturisticas/');
        $rutasturisticasArray = $rutasturcs->json();
        return view('rutasturisticas.index', compact('rutasturisticasArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rutasturisticas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/rutasturisticas',$request->all());

        return redirect('/listarutasturisticas');
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
        $rutasturc =  Http::get('http://whitecityApi.test/v1/rutasturisticas/'.$id);
        $rutasturisticasArray = $rutasturc->json();
        return view('rutasturisticas.edit')->with('rutasturisticasArray', $rutasturisticasArray);
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
        $rutasturisticasArray = Http::put('http://whitecityApi.test/v1/rutasturisticas/'.$id, $request->all());
        
    
        return redirect('/listarutasturisticas')->with('rutasturisticasArray', $rutasturisticasArray);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/rutasturisticas/'.$id);
        return redirect('/listarutasturisticas');
    }

    public function generar_pdf(){
        $rutasturcs = Rutas_Turistica::all();
        $pdf =PDF::loadView('rutasturisticas.rutasturisticas_pdf', compact('rutasturcs'));
        return $pdf->Stream('rutasacceso_registro.pdf'); //Para direccionar al navegador
          //return $pdf->download('servicios_registrados.pdf');
     }
}
