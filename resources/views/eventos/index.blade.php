{{-- @extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/cards.css">
</head>
 
  <div class="container">
    <h1>Eventos</h1>

<body>
  <div class="row">
    @foreach ($eventoArray as $event)
    <div class="col-12 col-sm-6 col-md-4">

    <div class="card">
      <img src="{{'http://localhost/whitecityApi.test/public/storage/image/'.$event['imagen']}}">
      <h4 class="card-title">{{$event['evento']}}</h4>
      <p class="card-title">{{$event['municipio']}}</p>
      <p class="card-lang.text">{{$event['descripcion']}}</p>
      <a href="detalleslugares">Leer más </a>
  </div>
</div>
  @endforeach
 </div>
</div>
  </body>
</div>
</html>
</div>
</div>
@endsection  --}}

@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/eventos.css">
</head>

<div class="container">
  <center><h1>Eventos</h1></center>
  
<body>
    <div class="row">
    @foreach ($eventoArray as $events)
    <div class="col-12 col-sm-6 col-md-4">
    <figure>
      <img src="{{'http://localhost/WhiteCityApi/storage/app/public/image/'.$events['imagen']}}">
      <div class="capa">
        <h4 class="card-title">{{$events['evento']}}</h4>
        <p class="card-title">{{$events['municipio']}}</p>
        <p class="card-title">{{$events['fecha_inicio']}}</p>
        <p class="card-title">{{$events['fecha_fin']}}</p>
        <a href="detalleslugares">Leer más </a>
      </div>
    </figure>
  </div> 
    @endforeach
  </div>
 </body>
</div>
</html> 
@endsection