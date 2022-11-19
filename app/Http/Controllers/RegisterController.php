<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tipo_persona;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{   public function index()
    {
        $users = Http::get('http://whitecityApi.test/v1/register/');
        $userArray = $users->json();
        return view('users.index')->with('userArray', $userArray);
    }


    public function create(){
         
        
        $rol=Tipo_persona::all();
        return view('auth.register', compact('rol'));

    }
    
    public function store(Request $request){

        $this->validate(request(),[
            'nombres'=>'required',
            'apellidos'=>'required',
            'email'=>'required|email',
            'password'=> 'required|confirmed',

        ]);
        
        $users = new User ();
        $users->tipo_persona_id = $request->tipo_persona_id;
        $users->nombres = $request->nombres;
        $users->apellidos = $request->apellidos;
        $users->email= $request->email;
        $users->password= $request->password;
        $users->save();
        auth()->login($users);
        return redirect()->to('/');

      }

    }

