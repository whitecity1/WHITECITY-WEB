<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notificacion;
use App\Models\Tipo_persona;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {
        $users = Http::get('http://whitecityApi.test/v1/users/');
        $userArray = $users->json();
        return view('users.index')->with('userArray', $userArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
        $rol=Tipo_persona::all();
        return view('users.create', compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/users',$request->all());

        return redirect('/users');
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
        $user = Http::get('http://whitecityApi.test/v1/users/'.$id);
        $userArray = $user->json();
       
        $rol=Tipo_persona::all();
        return view('users.edit', compact('rol'))->with('userArray', $userArray);
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

        $user = Http::put('http://whitecityApi.test/v1/users/'.$id);
        $userArray = $user->json();
 
         return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/users/'.$id);
        return redirect('/users');
    }

    public function listarusuarios(){
        $users = User::all();
        return view('users.listarusers')->with('users',$users);
     }

     public function generar_pdf(){
        $users = User::all();
        $pdf =PDF::loadView('users.users_pdf', compact('users'));
        return $pdf->Stream('usuarios_registrados.pdf'); //Para direccionar al navegador
     }
}
