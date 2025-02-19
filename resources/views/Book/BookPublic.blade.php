@extends('production.1')
@section('content')
    {{-- <div class="bg-black"style="height:100px">

    </div> --}}


<form class="" action="" id="Book">
    @csrf
    <section class="text-center  py-5 "id="mycontent"
        style="background: url('../../resource/1738952046_67a64d6ec4181banner-negro.jpg') no-repeat center center/cover; color: white;">
        <div class="container mt-4">
            <p></p>
            <div class="bg-white justify-content-center d-flex mt-5" style="border-radius:10px">
                <h1 class=" fw-bold text-uppercase display-4 text-lg-start my-4" style="color: #054E5C">Libro de Reclamaciones

            </div>
            </h1>

            <div class="row g-3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">



                <div class="container mt-4">
                    <!-- Encabezado -->
                
            
                    <!-- Descripción -->
                    <p class="text-start fw-semibold text-white mt-3">
                        Este formulario es exclusivamente para expresar su disconformidad con algún producto o servicio brindado por <b>
                            AYBAR CORP. SOCIEDAD ANONIMA CERRADA - AYBAR CORP. S.A.C
                        </b> 
                        Todos los campos son obligatorios.
                    </p>
            
                    <!-- Información de la Empresa -->
                    {{-- <div class="card shadow-sm border-0 text-start" style="background-color:#ffffff">
                        <div class="card-body text-black">
                            <h4 class="fw-bold text-warning">Empresa</h4>
                            <p><b>Razón Social:</b> ComexLat & S.A.C.</p>
                            <p><b>RUC:</b> 20603865813</p>
                            <p><b>Dirección Legal:</b> Av. Circunvalación Del Golf Los Incas 134 Patio Panorama, Santiago de Surco</p>
                            <p><b>Fecha actual:</b> <span id="current-date"></span></p>
                        </div>
                    </div> --}}
                    <div class="card shadow-sm border-0 text-start" style="background-color:#ffffff">
                        <div class="card-body text-black">
                            <h4 class="fw-bold "style="color:#054E5C">Empresa</h4>
                            <p><b>Razón Social:</b> AYBAR CORP. SOCIEDAD ANONIMA CERRADA - AYBAR CORP. S.A.C</p>
                            <p><b>RUC:</b> 20603865813</p>
                            <p><b>Dirección Legal:</b> 
Av. Circunvalación Del golf Los Incas 134 Patio Panorama, Santiago de Surco.
                            </p>
                            <p><b>Fecha actual:</b> <span id="current-date"></span></p>
                        </div>
                    </div>
                </div>
            
                <script>
                    // Mostrar la fecha actual en formato YYYY-MM-DD
                    document.getElementById("current-date").textContent = new Date().toISOString().split('T')[0];
                </script>



                <div class="col-12 ">
                    <h1 class="fw-bold text-uppercase fs-4 text-lg-start " style="color: white;">1. Identificación del
                        consumidor reclamante</h1>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="names" name="names" class="form-control" placeholder="Ingrese su nombre"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="firstname" name="firstname" class="form-control"
                        placeholder="Apellido Paterno"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Apellido Materno"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-6">
                    <input type="text" id="address" name="address" class="form-control" placeholder="Dirección"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-12 col-md-6">
                    <select id="document_type" name="document_type" class="form-control"
                        style="background-color: rgba(0, 0, 0, 0.63); color: rgb(255, 255, 255); border: 1px solid #666464; padding: 12px;font-size:20px">
                        <option value="" disabled selected>Seleccione tipo de documento</option>
                        <option value="dni">DNI</option>
                        <option value="ce">Carné de Extranjería</option>
                        <option value="passport">Pasaporte</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="document_number" name="document_number" class="form-control"
                        placeholder="Número de documento"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-12 col-md-6">
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Número celular"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-12 col-md-6">
                    <input type="email" id="email" name="email" class="form-control"
                        placeholder="Correo electrónico"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>

                <!-- Tipo de bien a reclamar -->
                <div class="col-12 mt-5">
                    <h1 class="fw-bold text-uppercase fs-4 text-lg-start " style="color: white;">2. Identificación del
                        bien contratado</h1>
                </div>
                <div class="col-12 row text-center my-3">
                    <div class="col 6">

                        <input class="form-check-input"type="radio" id="product" name="claim_type"class="radio"
                            value="Producto">
                        <label class="form-check-label" for="exampleRadios1">
                            Producto
                        </label>
                    </div>
                    <div class="col 6">
                        <input class="form-check-input"type="radio" id="service" name="claim_type" value="Servicio">
                        <label class="form-check-label" for="exampleRadios1">
                            Servicio
                        </label>
                    </div>
                </div>


                <div class="col-12 col-md-6">
                    <input type="number" id="claimed_amount" name="claimed_amount" class="form-control"
                        placeholder="Monto reclamado" step="0.01"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>
                <div class="col-12 col-md-6">
                    <select id="currency_type" name="currency_type" class="form-control"
                        style="background-color: rgba(0, 0, 0, 0.63); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                        <option value="">Seleccione moneda</option>
                        <option value="PEN">Soles (PEN)</option>
                        <option value="USD">Dólares (USD)</option>
                    </select>
                </div>

                <div class="col-12">
                    <input type="text" id="office_address" name="office_address" class="form-control"
                        placeholder="Dirección de oficina"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px">
                </div>

                <div class="col-12">
                    <textarea id="product_or_service_description" name="product_or_service_description" class="form-control"
                        placeholder="Descripción del producto o servicio"
                        style="background: rgba(255, 255, 255, 0.1); 
                       color: white; 
                       border: 1px solid #666464; 
                       padding: 12px; 
                       font-size: 20px;
                       width: 100%;
                       min-height: 100px;
                       resize: vertical;"></textarea>

                    <style>
                        /* Forzar el color del placeholder */
                        textarea::placeholder {
                            color: rgb(255, 255, 255) !important;
                            /* Color gris claro para visibilidad */
                            opacity: 1 !important;
                            /* Asegurar que se vea */
                        }
                    </style>

                </div>
                <div class="col-12 mt-5">
                    <h1 class="fw-bold text-uppercase fs-4 text-lg-start " style="color: white;">3. Detalle de la
                        reclamación</h1>
                </div>
                <div class="col-12 mt-2 text-xl-justify text-start">
                    <p> <b class="m-5 ">• Queja:</b>Malestar, descontento o disconformidad no relacionada al producto o
                        servicio o con respecto a la atención recibida.</p>

                    <p class="mt-n3">
                        <b class="m-5 ">• Reclamo:</b>Disconformidad con respecto al producto o servicio.
                    </p>
                </div>

                <!-- Tipo de reclamo -->
                <div class="col-12 row text-center my-3">
                    <div class="col-6">
                        <input class="form-check-input" type="radio" id="complaint" name="complaint_type"
                            value="Queja">
                        <label class="form-check-label" for="complaint">
                            Queja
                        </label>
                    </div>
                    <div class="col-6">
                        <input class="form-check-input" type="radio" id="claim" name="complaint_type"
                            value="Reclamo">
                        <label class="form-check-label" for="claim">
                            Reclamo
                        </label>
                    </div>
                </div>


                <div class="col-12">
                    <textarea id="complaint_details" name="complaint_details" class="form-control" placeholder="Detalle del reclamo"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px"></textarea>
                </div>

                <div class="col-12">
                    <textarea id="complaint_request" name="complaint_request" class="form-control" placeholder="Pedido del reclamo"
                        style="background: rgba(255, 255, 255, 0.1); color: white; border: 1px solid #666464; padding: 12px;font-size:20px"></textarea>
                </div>

                <div class="col-12">
                    <button data-aos="flip-right" data-aos-duration="1000" data-aos-delay="100" type="button"
                        onclick="BookStorePublic();return false" class="btn w-100"
                        style="background: #FFA726; color: white; font-weight: bold; padding: 12px;">
                        <h1 class="text-white">Enviar</h1>
                    </button>
                </div>
            </div>


        </div>
    </section>
</form>
@endsection