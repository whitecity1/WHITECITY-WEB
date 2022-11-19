@extends('layouts.app')

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
    <h1>lugares recomendados </h1>

<body>
  <div class="row">
    @foreach ($recomendadoArray as $rec)
    <div class="col-12 col-sm-6 col-md-4">

    <div class="card">
      <img src="{{'http://localhost/WhiteCityApi/storage/app/public/image/'.$rec['imagen']}}">
      <h4 class="card-title">{{$rec['lugar_recomendado']}}</h4>
      <p class="card-title">{{$rec['resenahistorica']}}</p>
      {{-- <p class="card-lang.text">{{$rec['calificaciones']}}</p> --}}
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
@endsection 