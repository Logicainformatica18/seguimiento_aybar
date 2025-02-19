@extends('home.template')
@section('content')
    <!-- Sección completa -->
    <section class=" bg-dark text-white">
        <!-- Barra lateral -->

        <!-- Contenido central -->
        <div class="container-fluid py-5">
            <div class="row justify-content-center align-items-center text-center" style="height: 300px;">
                <h1 class="fw-bold">PORTADA</h1>
            </div>
        </div>

    </section>

    <section class="  text-white" style="background-color: #F6A42C">
        <div class="container BG-WA ">
            <div class="row justify-content-center align-items-center text-center" style="height: 100px;">
                <h2 style="word-spacing: 8px;letter-spacing:2px">NOTICIAS RELACIONADAS</h2>
            </div>
        </div>
    </section>

    <style>
        /* Personalización de las tarjetas */
        .custom-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            /* Sombra inicial */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            /* Elevar la tarjeta en hover */
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            /* Incrementar sombra */
        }

        .custom-btn {
            background-color: #FFA500;
            /* Botón naranja */
            border: none;
            border-radius: 25px;
            color: white;
            padding: 8px 20px;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .custom-btn:hover {
            background-color: #FF8C00;
            /* Naranja más oscuro en hover */
        }
    </style>

    <div class="container  py-5">
        <div class="row g-4">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card custom-card text-center">
                    <div class="card-body">
                        <img src="https://wallpapers.com/images/hd/blogging-backdrop-with-laptop-msaf9d67o4r5dl74.jpg"
                            class="img-fluid mb-3" alt="Icono">
                        <h5 class="card-title fw-bold">LOTES DE TERRENO EN PERÚ</h5>
                        <p class="card-text text-muted">Resumen del artículo</p>
                        <a href="#" class="btn custom-btn">Conocer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 2 -->
            <div class="col-md-4">
                <div class="card custom-card text-center">
                    <div class="card-body">
                        <img src="https://wallpapers.com/images/hd/blogging-backdrop-with-laptop-msaf9d67o4r5dl74.jpg"
                            class="img-fluid mb-3" alt="Icono">
                        <h5 class="card-title fw-bold">ARTÍCULO 2</h5>
                        <p class="card-text text-muted">Resumen del artículo</p>
                        <a href="#" class="btn custom-btn">Conocer más</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta 3 -->
            <div class="col-md-4">
                <div class="card custom-card text-center">
                    <div class="card-body">
                        <img src="https://wallpapers.com/images/hd/blogging-backdrop-with-laptop-msaf9d67o4r5dl74.jpg"
                            class="img-fluid mb-3" alt="Icono">
                        <h5 class="card-title fw-bold">ARTÍCULO 3</h5>
                        <p class="card-text text-muted">Resumen del artículo</p>
                        <a href="#" class="btn custom-btn">Conocer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
