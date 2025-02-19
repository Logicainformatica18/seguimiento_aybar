@extends('home.template')
@section('content')
    <style>
        .shadowed-text {
            text-shadow: 1px 1px 1px #000000;
            /* Contorno sombreado */
        }

        .transparencia_cabecera_md {


            /* Ajuste opcional */
            mask-image: linear-gradient(to top, #000000 10%, transparent 100%);

            /* -webkit-mask-image: linear-gradient(to top, #000000 60%, transparent 100%); */
        }      
         .transparencia_cabecera_xl {


/* Ajuste opcional */
mask-image: linear-gradient(to top, #000000 60%, transparent 100%);

/* -webkit-mask-image: linear-gradient(to top, #000000 60%, transparent 100%); */
}
    </style>
    <section class=" text-white" style="background-color: #03242b ">
        <div
            class="d-none  d-md-block
            pt-xl-4 pt-5 pt-sm-5  w-100 position-absolute
             align-content-center text-center translate-middle  start-50 ">
            <h4 class="fw-bold mt-5 shadowed-text"style="word-spacing: 10px;letter-spacing: 8px">
                <p></p>
                <span class="text-white ">CUMPLIENDO EL LOTE </span>DE TUS SUEÑOS
            </h4>
        </div>
        <div
        class=" d-sm-block d-md-none
         m-1 pt-3  w-100 position-absolute
         align-content-center text-center translate-middle  start-50 ">
        <h4 class="fs-2 fw-bold mt-5 shadowed-text"style="word-spacing:5px;letter-spacing: 5px">
            <p></p>
            <span class="text-white ">CUMPLIENDO EL LOTE </span>    DE TUS SUEÑOS
        </h4>
    </div>
    <div class="d-none d-md-block">
       <!-- Imagen de fondo -->
       <img src="https://cdn.21online.lat/mexico/cache/awsTest1/rc/oLGNvFZf/uploads/471/propiedades/467598/634da15bb4574.jpeg"
       alt="Imagen principal" class="w-100 transparencia_cabecera_xl" height="500px">

    </div>
    <div class=" d-md-none">
        <!-- Imagen de fondo -->
        <img src="https://cdn.21online.lat/mexico/cache/awsTest1/rc/oLGNvFZf/uploads/471/propiedades/467598/634da15bb4574.jpeg"
        alt="Imagen principal" class="w-100 transparencia_cabecera_md" height="200px">
 
     </div>
        <!-- Texto sobrepuesto -->



    </section>




    <style>
        /* Necesario para el efecto hover */
        .card-hover {
          position: relative;
          overflow: hidden;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          border-radius: 15px;
        }
        .card-hover img {
          transition: opacity 0.3s ease;
        }
        .card-hover:hover img {
          opacity: 0; /* Oculta la imagen en hover */
        }
        .card-hover .hover-content {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: white;
          color: black;
          display: flex;
          justify-content: center;
          align-items: center;
          opacity: 0; /* Oculta el texto por defecto */
          transition: opacity 0.3s ease;
        }
        .card-hover:hover .hover-content {
          opacity: 1; /* Muestra el texto en hover */
        }
      </style>
    </head>
    <body>
      <div class="container py-5">
        <h2 class="display-6 text-center mb-4"style="word-spacing:8px;letter-spacing:3px"><b>UBICA TU PRÓXIMO HOGAR</b> </h2>
        <p class="fs-7 text-justify mb-5"style="color:#03424E">
          Somos una inmobiliaria completamente peruana, dedicada a la creación de proyectos inmobiliarios
          de terrenos de todas las familias del Perú. Ofrecemos terrenos exclusivos en el país.
        </p>
        <div class="row">
          <!-- Tarjeta Lima -->
          <div class="col-xl-2 col-0"></div>
          <div class="col-lg-6 col-xl-4 col-md-6">
            <div class="card card-hover shadow "style="position: relative;">
              <img src="https://c4.wallpaperflare.com/wallpaper/674/99/752/cities-lima-city-coast-wallpaper-preview.jpg" class="card-img-top" alt="Lima">
              <h1 clasS="bottom-0 start-20  p-3 pb-0" style="position: absolute; ">LIMA</h1>
              <div class="hover-content">
                <p class="fw-bold">Explora las oportunidades en Lima</p>
              </div>
            </div>
          </div>
          <!-- Tarjeta Ica -->
          <div class="col-lg-6 col-xl-4 col-md-6">
            <div class="card card-hover shadow "style="position: relative;">
                <img src="https://c4.wallpaperflare.com/wallpaper/674/99/752/cities-lima-city-coast-wallpaper-preview.jpg" class="card-img-top" alt="Lima">
                <h1 clasS="bottom-0 start-20  p-3 pb-0" style="position: absolute; ">ICA</h1>
                <div class="hover-content">
                  <p class="fw-bold">Descubre los proyectos en Ica</p>
                </div>
              </div>
         
          </div>
          <div class="col-xl-2 col-0"></div>
          <div class="col-xl-2 col-0"></div>
          <div class="col-lg-6 col-xl-4 col-md-6">
            <div class="card card-hover shadow "style="position: relative;">
              <img src="https://c4.wallpaperflare.com/wallpaper/674/99/752/cities-lima-city-coast-wallpaper-preview.jpg" class="card-img-top" alt="Lima">
              <h1 clasS="bottom-0 start-20  p-3 pb-0" style="position: absolute; ">LIMA</h1>
              <div class="hover-content">
                <p class="fw-bold">Explora las oportunidades en Lima</p>
              </div>
            </div>
          </div>
          <!-- Tarjeta Ica -->
          <div class="col-lg-6 col-xl-4 col-md-6">
            <div class="card card-hover shadow "style="position: relative;">
                <img src="https://c4.wallpaperflare.com/wallpaper/674/99/752/cities-lima-city-coast-wallpaper-preview.jpg" class="card-img-top" alt="Lima">
                <h1 clasS="bottom-0 start-20  p-3 pb-0" style="position: absolute; ">ICA</h1>
                <div class="hover-content">
                  <p class="fw-bold">Descubre los proyectos en Ica</p>
                </div>
              </div>
         
          </div>
          <div class="col-xl-2 col-0"></div>
        </div>
      </div>
@endsection
