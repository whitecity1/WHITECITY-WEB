@extends('layouts.app')

@section('content')

@section('title','Home')

    <head>
        <title>Carrusel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="windth=devise-width,user-scalable=no,
         initial-scale=1,  maximum-scale=1, minimum-scale=1">
         <link rel="stylesheet" href="{{'css/app.css'}}">
     
    </head>
    <body>
        <div class="slider">
            <ul>
                <li><img src="storage\image\s3.png"  alt=""></li>
                <li><img src="storage\image\s1.png" alt=""></li>
                <li><img src="storage\image\s2.png" alt=""></li>
                <li><img src="storage\image\s1.png" alt=""></li>
            </ul>
        </div>

        <!DOCTYPE html>
        <html lang="es">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Galería fotográfica </title>
          <link rel="stylesheet" href="{{'css/nuevo.css'}}">
        </head>
          <section class="welcome">
            <h2 class="section__title">BIENVENIDOS A WITHE CITY</h2>
            <p class="welcome__txt">White City da a conocer los  lugares mas emblemáticos 
              dentro del municipio de Popayan. 
            Con nosotros descubres nuevos lugares y vives mejores experiencias.</p>
            <p class="welcome__txt">Te contamos a cerca de nosotros ... </p>
            
            <a href="/quienesomos" class="welcome__btn">QUIENES SOMOS</a>
            <br>
            <p class="welcome__txt">Conócenos y descubre nuestro objetivo.</p>
          </section>
     

        <section class="container-design">
          <div class="design__item">
            <a href="/hoteles"><h3 class="design__title">Hoteles</h3></a>
            <img src="https://images.pexels.com/photos/262048/pexels-photo-262048.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="design__img">
          </div>
          <div class="design__item">
            <a href="/restaurantes"><h3 class="design__title">Restaurantes</h3></a>
            <img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="design__img">
          </div>
          <div class="design__item">
            <a href="/centroscomerciales"><h3 class="design__title">Centros Comerciales</h3></a>
            <img src="https://images.pexels.com/photos/2861656/pexels-photo-2861656.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="design__img">
          </div>
          <div class="design__item">
            <a href="/puntosatencion"><h3 class="design__title">Puntos de Atencion</h3></a>
            <img src="https://images.pexels.com/photos/3116970/pexels-photo-3116970.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="design__img">
          </div>
        </section>

        <section class="container-testimonials">
          <h3 class="section__title">POPAYÁN LA CIUDAD BLANCA</h3>
          <img src="https://images.pexels.com/photos/13200191/pexels-photo-13200191.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="testimonials__img">
          <p class="testimonials__txt">Popayán es una ciudad del oeste de Colombia, al suroeste de Bogotá. Es conocida por sus edificios coloniales encalados y por ser un centro religioso con procesiones populares en Semana Santa. Las iglesias principales de la ciudad incluyen la Catedral 
            Basílica de Nuestra Señora de la Asunción, de estilo neoclásico y con una cúpula, y la Iglesia de La Ermita, del siglo XVII.</p>
          <p class="testimonials__name">Municipio en Colombia</p>
        </section>
        <section class="container-tips">
          <div class="design__item">
           <a href="/rutasturisticas"><h3 class="design__title">Rutas turísticas</h3></a>
            <img src="https://images.pexels.com/photos/3762284/pexels-photo-3762284.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="design__img">
          </div>
          <div class="container-box">
            <div class="box">
              <div class="box__icon"><i class="fa fa-star" aria-hidden="true"></i></div>
              <div class="box__content">
                <a href="/recomendados"><h3 class="box__title">LUGARES RECOMENDADOS</h3></a>
                <p class="box__txt">Lugares recomendados que debes visitar....</p>
              </div>
            </div>
            <div class="box">
              <div class="box__icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
              <div class="box__content">
                <a href="/eventos"><h3 class="box__title">EVENTOS</h3></a>
                <p class="box__txt">Algunos eventos que te permiten vivir una experiencia única...</p>
              </div>
            </div>
            <div class="box">
              <div class="box__icon"><i class="fa fa-street-view" aria-hidden="true"></i></i></div>
              <div class="box__content">
                <a href="/mapa"><h3 class="box__title">MAPA</h3></a>
                <p class="box__txt">Descubre la distancia entre una nueva experiencia y tu ubicación...</p>
              </div>
            </div>
          </div>
        </section>
      

        <!DOCTYPE html>
        <html lang="es">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Video</title>
          <link rel="stylesheet" href="{{'css/video.css'}}">
         <link rel="preconnect" href="https://fonts.googleapis.com/css?family-Raleway:700,800,900&display=swap" rel="stylessheet">

        </head>
        <body>
          <br>
          <div class="header">
            <center>
          <h1>Bienvenidos a Popayán, la ciudad blanca de Colombia</h1>
            </center>
         <video muted controls loop >
            <source src="{{asset('storage\videos\PopayánEsEncantadora.mp4')}}" type="video/mp4">
         </video>
        </body>
        </html>  
@endsection
