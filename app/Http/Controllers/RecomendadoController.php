<?php

namespace App\Http\Controllers;

use App\Models\Recomendado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecomendadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarecomendados(){
        $recs = Http::get('http://whitecityApi.test/v1/recomendados/');
        $recomendadoArray = $recs->json();
        return view('recomendados.listarecomendados')->with('recomendadoArray',$recomendadoArray);
     }
     
    public function index()
    {
        $recs =  Http::get('http://whitecityApi.test/v1/recomendados/');
        $recomendadoArray = $recs->json();
        return view('recomendados.index', compact('recomendadoArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user=User::all();
        return view('recomendados.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        Http::post('http://whitecityApi.test/v1/recomendados',$request->all());

       return redirect('/listarecomendados');
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
        $recs = Http::get('http://whitecityApi.test/v1/recomendados/'.$id);
        $recomendadoArray = $recs->json();
        $user=User::all();
        return view('recomendados.edit', compact('user'))->with('recomendadoArray', $recomendadoArray);
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
        $recomendadoArray = Http::put('http://whitecityApi.test/v1/recomendados/'.$id, $request->all());
        
    
        return redirect('/listarecomendados')->with('recomendadoArray', $recomendadoArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/recomendados/'.$id);
      
        return redirect('/listarecomendados');
    }

    public function detalleslugares(){
        $recs = Recomendado::all();
        return view('lugaresturisticos.detalleslugares', compact('recs'));
    }
}

