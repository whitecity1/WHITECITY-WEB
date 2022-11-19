@extends('layouts.plantilla')

@section('contenido')

<h1 class="text-black text center">AUTORIDADES</h1>
<a href="{{route('autoridades.create')}}" class="btn btn-primary">Crear</a>
<a  href="{{route('autoridades-pdf')}}" class="btn btn-primary"> PDF </a>
<div class="table-responsive">
<table id="idautoridades" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <th> Id </th>
        <th> Imagen</th>
        <th> Nombre </th>
        <th> Telefono </th>
        <th> CorreoElectrónico</th>
        <th> Municipio </th>
        <th> Dirección </th>
        <th> Apertura </th>
        <th> cierre </th>
        <th> Acciones </th>
    </thead>
    <tbody>
        @foreach ($autoridadesArray as $autoridadesArray)
          <tr>
            <td>{{$autoridadesArray['id']}}</td>
            <td>
              <img src="{{'http://localhost/WhiteCityApi/storage/app/public/image/'.$autoridadesArray['imagen']}}" alt="" width="200" >
            </td>
            <td>{{$autoridadesArray['nombre_entidad']}}</td>
            <td>{{$autoridadesArray['telefono']}}</td>
            <td>{{$autoridadesArray['correo']}}</td>
            <td>{{$autoridadesArray['mun_ubicado']}}</td>
            <td>{{$autoridadesArray['direccion']}}</td>
            <td>{{$autoridadesArray['apertura']}}</td>
            <td>{{$autoridadesArray['cierre']}}</td>
            <td>
              <form action="{{ route('autoridades.destroy', $autoridadesArray['id']) }}" method="POST">
                <a href="/autoridades/{{$autoridadesArray['id']}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>  
        @endforeach
    </tbody>
 </table>
</div>
@endsection