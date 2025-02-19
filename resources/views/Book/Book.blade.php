@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="text-primary">Reclamaciones</h1>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Reclamaciones
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datatables">

                <!-- start File export -->
                <div class="card">
                    <div class="card-body">
                      
                        <p class="card-subtitle mb-3">
                            <!-- success header modal -->
                            {{-- @canany(["administrar","agregar"])
                            <button type="button" class="btn mb-1 me-1 btn-success"
                                data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                 onclick="New();$('#Book')[0].reset();">
                                Agregar
                            </button>
                            @endcanany --}}
                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive"id="mycontent">



                            @include('Book.Booktable')

                        </div>
                    </div>
                </div>


                <!-- end Language file -->

                <!-- end Setting defaults -->


                <!-- end Custom toolbar elements -->
            </div>
        </div>
    </div>

    <div class="button-group">


        <!-- /.modal -->
        <!-- danger header modal -->

        <!-- /.modal -->

        <!-- /.modal -->

        <!-- success Header Modal -->
        <div id="success-header-modal" class="modal " tabindex="-1" aria-labelledby="success-header-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-xl">
                <div class="modal-content ">
                    <div class="modal-header modal-colored-header bg-success text-white">
                        <h4 class="modal-title text-white" id="success-header-modalLabel">
                            Reclamaciones
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <style>
                        input::placeholder, 
textarea::placeholder {
    color: rgb(121, 121, 121) !important;
    opacity: 1 !important; /* Asegura que el color sea visible */
}
select option[disabled] {
    color: rgb(121, 121, 121)  !important;
}

                    </style>
                    <div class="modal-body ">


                        <form action="" method="post" role="form" id="Book"
                            name="Book"enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}
<div class="row">
    <div class="row col-6">
        <div class="col-12 col-md-6">
            <input type="text" id="names" name="names" class="form-control"readonly placeholder="Ingrese su nombre">
        </div>
    
        <div class="col-12 col-md-6 mt-2 mt-md-0">
            <input type="text" id="firstname" name="firstname" class="form-control"readonly placeholder="Apellido Paterno">
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <input type="text" id="lastname" name="lastname" class="form-control"readonly placeholder="Apellido Materno">
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <input type="text" id="address" name="address" class="form-control"readonly placeholder="Dirección">
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <select id="document_type" name="document_type" class="form-control"readonly>
                <option value="" disabled selected>Seleccione tipo de documento</option>
                <option value="dni">DNI</option>
                <option value="ce">Carné de Extranjería</option>
                <option value="passport">Pasaporte</option>
            </select>
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <input type="text" id="document_number" name="document_number" class="form-control"readonly placeholder="Número de documento">
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <input type="tel" id="phone" name="phone" class="form-control"readonly placeholder="Número celular">
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <input type="email" id="email" name="email" class="form-control"readonly placeholder="Correo electrónico">
        </div>
    
        <!-- Tipo de bien a reclamar -->
        <div class="col-12 col-md-6 mt-3">
            <input type="radio" id="product" name="claim_type"readonly class="form-check-input" value="Producto">
            <label class="form-check-label" for="product">Producto</label>
        </div>
    
        <div class="col-12 col-md-6 mt-3">
            <input type="radio" id="service" name="claim_type" readonly class="form-check-input" value="Servicio">
            <label class="form-check-label" for="service">Servicio</label>
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <input type="number" id="claimed_amount" name="claimed_amount" class="form-control"readonly placeholder="Monto reclamado" step="0.01">
        </div>
    
        <div class="col-12 col-md-6 mt-2">
            <select id="currency_type" name="currency_type" class="form-control"readonly>
                <option value="">Seleccione moneda</option>
                <option value="PEN">Soles (PEN)</option>
                <option value="USD">Dólares (USD)</option>
            </select>
        </div>
    
        <div class="col-12 col-md-12 mt-2">
            <input type="text" id="office_address" name="office_address" class="form-control"readonly placeholder="Dirección de oficina">
        </div>
    
        <div class="col-12 mt-2">
            <textarea id="product_or_service_description" name="product_or_service_description" class="form-control"readonly placeholder="Descripción del producto o servicio"></textarea>
        </div>
    
        <!-- Tipo de reclamo -->
        <div class="col-12 col-md-6 mt-3">
            <input type="radio" id="complaint" name="complaint_type"readonly class="form-check-input" value="Queja">
            <label class="form-check-label" for="complaint">Queja</label>
        </div>
    
        <div class="col-12 col-md-6 mt-3">
            <input type="radio" id="claim" name="complaint_type"readonly class="form-check-input"readonly value="Reclamo">
            <label class="form-check-label" for="claim">Reclamo</label>
        </div>
    
        <div class="col-12 mt-2">
            <textarea id="complaint_details" name="complaint_details" class="form-control"readonly placeholder="Detalle del reclamo"></textarea>
        </div>
    
        <div class="col-12 mt-2">
            <textarea id="complaint_request" name="complaint_request" class="form-control"readonly placeholder="Pedido del reclamo"></textarea>
        </div>
    </div>
    <div class="col-6">
      <h4>¿En qué estado se encuentra el reclamo?</h4>
      <select class="form-control mb-4" id="state"name="state">
        <option selected="" disabled="">Seleccione el Estado</option>
        <option value="Pendiente">Pendiente</option>
        <option value="Proceso">Proceso</option>                               
        <option value="Atendido">Atendido</option>
        <option value="Observado">Observado</option>
        <option value="Finalizado">Finalizado</option>
        <option value="Cerrado">Cerrado</option>
      </select>
    
      <span>Mensaje </span>
      <textarea name="message" id="message" class="form-control my-2"></textarea>
      <div class="container align-content-center">
        <div class="form-group row">
            Archivo 1
            <input class="form-control" type="file" id="file_1" name="file_1" onchange="readImage(this,'#blah_1');">
            Archivo 2
            <input class="form-control" type="file" id="file_2" name="file_2" onchange="readImage(this,'#blah_2');">



        </div>
        <div class="size-100">
            <br>
            <img id="blah_1" name="blah_1" src="https://placehold.co/150" alt="Tu imagen" class="img-bordered" width="100px">
            <img id="blah_2" name="blah_2" src="https://placehold.co/150" alt="Tu imagen" class="img-bordered" width="100px">
        </div>
    </div>
      
      @canany(['administrar', 'agregar'])<input type="button" value="Enviar" class="mt-5 btn bg-success-subtle text-success "
      onclick="BookUpdate()" id="create">
      @endcanany
     
  <button type="button" class="mt-5 btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>

</div>
                           
                            
                            

                    </div>
                    <div class="modal-footer">
                       
                       
                      </form>







                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!-- /.modal -->
    </div>
@endsection