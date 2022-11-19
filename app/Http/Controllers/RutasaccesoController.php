<?php

namespace App\Http\Controllers;
use App\Models\Rutas_Acceso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class RutasaccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarutasacceso(){
        $rutas = Http::get('http://whitecityApi.test/v1/rutasacceso/');
        $rutasArray = $rutas->json();
        return view('rutasacceso.listarutasacceso')->with('rutasArray',$rutasArray);
     }

     public function index()
    {
        $rutas = Http::get('http://whitecityApi.test/v1/rutasacceso/');
        $rutasArray = $rutas->json();
        return view('rutasacceso.index',compact('rutasArray')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rutasacceso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/rutasacceso',$request->all());

        // $rutas->id = $request->get('id');
        // $rutas->empresa_transporte = $request->get('empresa_transporte');
        // $rutas->mun_ubicacion = $request->get('mun_ubicacion');
        // $rutas->inicio_atencion = $request->get('inicio_atencion');
        // $rutas->cierre_atencion = $request->get('cierre_atencion');
        // $rutas->direccion_empresa = $request->get('direccion_empresa');
        // $rutas->contacto = $request->get('contacto');
        // $rutas->correo_empresa = $request->get('correo_empresa');
        // $rutas->tipo_ruta = $request->get('tipo_ruta');

        // $file=$request->file('imagen');
        // $nombreArchivo = "img_".time().".".$file->guessClientExtension();
        // $request->file('imagen')->storeAs('public/image', $nombreArchivo );
        // $rutas->imagen = $nombreArchivo;
        

        // $rutas->save();

        return redirect('/listarutasacceso');
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
        $rutas = Http::get('http://whitecityApi.test/v1/rutasacceso/'.$id);
        $rutasArray = $rutas->json();
        return view('rutasacceso.edit')->with('rutasArray', $rutasArray);
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
        $rutasArray = Http::put('http://whitecityApi.test/v1/rutasacceso/'.$id, $request->all());
     
        return redirect('/listarutasacceso')->with('rutasArray', $rutasArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/rutasacceso/'.$id);
        // $ruta = Rutas_Acceso::find( $id);
        // $ruta->delete();
        return redirect('/listarutasacceso');
    }

    public function generar_pdf(){
        $rutas = Rutas_Acceso::all();
        $pdf =PDF::loadView('rutasacceso.rutasacceso_pdf', compact('rutas'));
        return $pdf->Stream('rutasacceso_registradas.pdf'); //Para direccionar al navegador
     }
}
