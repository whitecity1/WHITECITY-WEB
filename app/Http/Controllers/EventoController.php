<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
*/
public function listareventos(){
    $events = Http::get('http://whitecityApi.test/v1/eventos');
    $eventoArray = $events->json();
    return view('eventos.listareventos')->with('eventoArray',$eventoArray);
 }
     
    public function index()
    {
        $events = Http::get('http://whitecityApi.test/v1/eventos/');
        $eventoArray = $events->json();
        return view('eventos.index',compact('eventoArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user=User::all();
        return view('eventos.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       return'hola web';

    //   Http::post('http://whitecityApi.test/v1/eventos',$request->all());
       
    
        // return redirect('/listareventos');
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
        $user=User::all();
        $events = Http::get('http://whitecityApi.test/v1/eventos/'.$id);
        $eventoArray = $events->json();

        return view('eventos.edit', compact('user'))->with('eventoArray', $eventoArray);
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

       $events = Http::put('http://whitecityApi.test/v1/eventos/'.$id, $request->all());
       $eventoArray = $events->json();

        return redirect('/listareventos')->with('eventoArray', $eventoArray);
       
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/eventos/'.$id);
        return redirect('/listareventos'); 
    }

    public function generar_pdf(){
        $eventos = Evento::all();
        $pdf = PDF::loadView('eventos.eventos_pdf', compact('eventos'));  
        return $pdf->Stream('lista_eventos.pdf'); //Para direccionar al navegador
         //return $pdf->download('lista_eventos.pdf'); Para designar descarga directamente 
    }
}
