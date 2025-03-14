@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="text-primary">Clientes</h1>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Clientes
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
                            @canany(['administrar', 'agregar'])
                                <button type="button" class="btn mb-1 me-1 btn-success" data-bs-toggle="modal"
                                    data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                    onclick="New();$('#Customer')[0].reset();">
                                    Agregar
                                </button>
                            @endcanany

                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive"id="mycontent">



                            @include('Customer.Customertable')

                        </div>
                        <style>
                            .relative svg {
                                width: 44px;
                                /* Ajusta el tamaño del icono */
                                height: 44px;
                            }

                            .hidden div p {
                                display: none;

                            }

                            .hidden div {
                                margin: 20px
                            }
                        </style>
                        <div class="mt-5 d-flex justify-content-start" style="height:20px;width:100%">
                            {{ $Customer->links() }}
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
        <div class="modal fade" id="success-header-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title h4" id="exampleModalFullscreenLabel">
                            Detalles de Expediente
                        </h5>
                        <button type="button" class="text-end btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>

                        <form role="form" id="cite" name="customer"enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="customer_id" id="customer_id">
                            <p></p>



                    </div>

                    <div class="modal-body row container"
                        style="margin-left: 0; margin-right: 0; border-right: 1px solid #ededed; box-shadow:0px 0px 5px -1px #a7a7a7; border-radius: 12px;">

                        <div class="card bg-white"style="border: solid 1px #054988">
                            <div class="container  row">
                                <h4 class="mb-4 mt-4 mb-md-0 card-title">Datos de cliente</h4>
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="col-12 col-sm-6 mt-2">
                                        <label for="cliente_{{ $i }}"
                                            class="control-label border-bottom border-primary custom-cursor-default-hover">CLIENTE
                                            {{ $i }}</label>
                                        <li class="d-flex align-items-center gap-2 mb-4">
                                            <span class="p-1 rounded-circle text-bg-primary"></span>
                                            <input type="text" name="cliente_{{ $i }}"id="cliente_{{ $i }}" class="form-control">

                                        </li>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="dni_{{ $i }}"
                                            class="control-label border-bottom border-primary custom-cursor-default-hover">DNI
                                            {{ $i }}</label>
                                        <li class="d-flex align-items-center gap-2 mb-4">
                                            <span class="p-1 rounded-circle text-bg-primary"></span>
                                            <input type="text" name="dni_{{ $i }}"id="dni_{{ $i }}"class="form-control">

                                        </li>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="card bg-white"style="border: solid 1px #054988">
                            <div class="container  row">

                                <h4 class="mb-4 mb-md-0 card-title mt-4">Datos del Predio</h4>
                                <div class="col-12 col-sm-4">
                                    <label for=""
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Lote</label>
                                    <li class="d-flex align-items-center gap-2">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>

                                        <input type="text" id="lote"name="lote" class="form-control">
                                    </li>
                                </div>


                                <div class="col-12 col-sm-4">
                                    <label for="aux"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Aux</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="text" id="aux"name="aux" class="form-control">

                                    </li>
                                </div>

                                <div class="col-12 col-sm-4 mt-2">

                                    <label for="business_partner_id"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Socio Comercial</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <select name="state_id" id="state_id" class="form-control">
                                            @foreach ($business_partner as $item)
                                                <option value="{{$item->id}}">{{$item->description}}</option>
                                            @endforeach
                                        </select>
                                       

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">

                                    <label for="fecha_de_separacion"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha de Separación</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="fecha_de_separacion" name="fecha_de_separacion">

                                    </li>
                                </div>

                                <div class="col-12 col-sm-4 mt-2">

                                    <label for="precio_de_lista_inventario"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Precio de Lista</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="number" class="form-control" id="precio_de_lista_inventario" name="precio_de_lista_inventario">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="descuento_porcentaje"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Descuento Porcentaje</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="number" class="form-control" id="descuento_porcentaje" name="descuento_porcentaje">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="importe_de_venta"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Importe De Venta</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="number" class="form-control" id="importe_de_venta" name="importe_de_venta">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="state_id"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Estado</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <select name="state_id" id="state_id" class="form-control">
                                            @foreach ($state as $item)
                                                <option value="{{$item->id}}">{{$item->description}}</option>
                                            @endforeach
                                        </select>
                                     
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="state_id"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Redactado Por</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <select name="editors_id" id="editors_id" class="form-control">
                                            @foreach ($editor as $item)
                                                <option value="{{$item->id}}">{{$item->description}}</option>
                                            @endforeach
                                        </select>
                                     
                                    </li>
                                </div>

                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="dias_1"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Dias (Hoy - Fecha de Separación)</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="number" class="form-control" id="dias_1" name="dias_1">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="ingreso_a_operaciones"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Ingreso a Operaciones</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="ingreso_a_operaciones" name="ingreso_a_operaciones">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    
                                    <label for="recogido_no_devuelto"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Recogido No Devuelto</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="recogido_no_devuelto" name="recogido_no_devuelto">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    {{-- si es diferente a nada entonces  restar  hoy - Recogido no devuelto, contrario devolver 0 --}}
                                
                                    <label for="dias_2"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Dias 2</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="number" class="form-control" id="dias_2" name="dias_2">

                                    </li>
                                </div>

                                <div class="col-12 col-sm-4 mt-2">
                                    
                                    <label for="fecha_contrato_firmado_devuelto"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Contrato Firmado Devuelto</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="fecha_contrato_firmado_devuelto" name="fecha_contrato_firmado_devuelto">

                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="adenda_refinanciamiento"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Adenda Refinanciamiento</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="adenda_refinanciamiento" name="adenda_refinanciamiento">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="j2"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha J2</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="j2" name="j2">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="enviado_a_archivo"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Enviado a Archivo</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="enviado_a_archivo" name="enviado_a_archivo">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="virtual"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Virtual</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="virtual" name="virtual">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="notaria"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Notaría</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="notaria" name="notaria">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="chincha"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Chincha</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="chincha" name="chincha">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="post_venta"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha Post Venta</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="post_venta" name="post_venta">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="proceso_de_desistimiento"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Proceso De Desistimiento</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="proceso_de_desistimiento" name="proceso_de_desistimiento">
                                    </li>
                                </div>
                            
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="proceso_de_resolucion"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Proceso De Resolucion</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="proceso_de_resolucion" name="proceso_de_resolucion">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="cambio_de_titular"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Cambio De Titular</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="cambio_de_titular" name="cambio_de_titular">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="desistimiento"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Desistimiento</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="desistimiento" name="desistimiento">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="comisiones"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Comisiones</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <span class="p-1 rounded-circle text-bg-primary"></span>
                                        <input type="date" class="form-control" id="comisiones" name="comisiones">
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="cantidad_de_letras"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Cantidad De Letras</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                      <select name="cantidad_de_letras" id="cantidad_de_letras" class="form-control">
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                        <option value="48">48</option>
                                      </select>
                                       
                                    </li>
                                </div>
                                <div class="col-12 col-sm-4 mt-2">
                                    <label for="letras_verificadas"
                                        class="control-label border-bottom border-primary custom-cursor-default-hover">Letras Verificadas</label>
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <select name="letras_verificadas" id="letras_verificadas" class="form-control">
                                            <option value="">Seleccione una opción</option>
                                            <option value="aprobada">Aprobada</option>
                                            <option value="observadas">Observadas</option>
                                            <option value="rechazadas">Rechazadas</option>
                                            <option value="aceptada">Aceptada</option>
                                            <option value="corregidas">Corregidas</option>
                                            <option value="anulado">Anulado</option>
                                            <option value="devolucion">Devolvieron contratos para aplazamiento de firma</option>
                                            <option value="letras_verificadas">Letras Verificadas</option>
                                        </select>
                                    </li>
                                </div>
                              
                            </div>
                        </div>


                     





                        <div class="card bg-white"style="border: solid 1px #054988">
                            <div class="container  row">
                                <p></p>
                                <h4 class="mb-4 mb-md-0 card-title mt-2">Observaciones</h4>
                                <div class="col-12 col-sm-12 mt-2">
                                     
                                    <li class="d-flex align-items-center gap-2 mb-4">
                                        <textarea name="observaciones" id="observaciones" class="form-control">

                                        </textarea>
                                    </li>
                                </div>

                            </div>
                        </div>


                       
                      
                        </form>
                     



                       
                        
                    
                    </div>





                </div>

            </div>


        </div>



 


        <!-- /.modal -->
    </div>
@endsection
