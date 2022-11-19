<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarhoteles(){
        $hoteles = Http::get('http://whitecityApi.test/v1/hoteles/');
        $hotelArray = $hoteles->json();
        return view('hoteles.listarhoteles')->with('hotelArray',$hotelArray);
     }

    public function index()
    {
        $hoteles = Http::get('http://whitecityApi.test/v1/hoteles/');
        $hotelArray = $hoteles->json();
        return view('hoteles.index', compact('hotelArray'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hoteles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Http::post('http://whitecityApi.test/v1/hoteles',$request->all());

        return redirect('/listarhoteles');
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
        $hoteles = Http::get('http://whitecityApi.test/v1/hoteles/'.$id);
        $hotelArray = $hoteles->json();
        return view('hoteles.edit')->with('hotelArray', $hotelArray);
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
        $hotelArray = Http::put('http://whitecityApi.test/v1/hoteles/'.$id, $request->all());

        return redirect('/listarhoteles')->with('hotelArray', $hotelArray);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Http::delete('http://whitecityApi.test/v1/hoteles/'.$id);
       
        return redirect('/listarhoteles');
    }

    public function generar_pdf(){
        $hoteles = Hotel::all();
        $pdf =PDF::loadView('hoteles.hoteles_pdf', compact('hoteles'));
        return $pdf->Stream('hoteles_registrados.pdf');
     }
}
