@extends('layouts.plantilla')

@section('contenido')

<h1 class="text-black text center">FOTOGRAFIAS</h1>

<a href="{{route('fotografias.create')}}" class="btn btn-primary"> Nueva fotografía</a>
<a href="{{route('fotografias-pdf')}}" class="btn btn-primary"> PDF</a>

<div class="table-responsive">
<table id="idFotografias" class="table table-striped table-bordered" style="width:100%">
</div>
<br>
    <thead>
        <th> Id </th>
        <th> Fotografía</th>
        <th> Nombres</th>
        <th> Descripción </th> 
        <th > Acciones </th>
    </thead>
    <tbody>
        @foreach ($fotoArray as $fotoArray)
          <tr>
            <td>{{$fotoArray['id']}}</td>
            <td>
              <img src="{{'http://localhost/WhiteCityApi/storage/app/public/image/'.$fotoArray['imagen']}}" alt="" width="200" >
            </td>
            <td>{{$fotoArray['nombre']}}</td>
            <td>{{$fotoArray['descripcion']}}</td>
            <td>
              <form action="{{route('fotografias.destroy',$fotoArray['id'])}}" method="POST">
                <a href="/fotografias/{{$fotoArray['id']}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>  
        @endforeach
    </tbody>
</table>
@endsection
