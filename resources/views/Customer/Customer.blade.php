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


                <form action=""id="filter" name="filter">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    Filtros Avanzados (Expandible)
                                </button>

                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse  " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Primera Fila -->
                                    <div class="row text-center">
                                        <div class="col-6 mb-2">
                                            <label for="proyecto" class="form-label fw-bold">Proyecto</label>
                                            <select name="proyecto" id="proyecto" class="form-control">
                                                <option value="%" {{ request('proyecto') == '' ? 'selected' : '' }}>
                                                    Todos
                                                    @foreach ($Project as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ request('proyecto') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->description }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="estado" class="form-label fw-bold">Estado</label>
                                            <select name="estado" id="state_filter" class="form-control">
                                                <option value="%" {{ request('estado') == '' ? 'selected' : '' }}>Todos
                                                    @foreach ($state as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ request('estado') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->description }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Motivo -->
                                        <!-- Botón Filtrar -->
                                        <div class="col-4">
                                            <label for="socio_comercial" class="form-label fw-bold">Socio Comercial</label>
                                            <select name="socio_comercial" id="socio_comercial" class="form-control">

                                                <option value="%"
                                                    {{ request('socio_comerical') == '' ? 'selected' : '' }}>Todos
                                                    @foreach ($business_partner as $a)
                                                <option value="{{ $a->id }}"
                                                    {{ request('socio_comercial') == $a->id ? 'selected' : '' }}>
                                                    {{ $a->description }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>





                                        <div class="col-4">
                                            <label for="letras_verificada" class="form-label fw-bold">Letras
                                                Verificadas</label>

                                            <select name="letras_verificada" id="letras_verificada" class="form-control">
                                                <option value="%"
                                                    {{ request('letras_verificada') == '' ? 'selected' : '' }}>Todos
                                                </option>
                                                @foreach ($letras_verificadas as $item)
                                                    <option value="{{ $item->letras_verificadas }}"
                                                        {{ request('letras_verificada') == $item->letras_verificadas ? 'selected' : '' }}>
                                                        {{ $item->letras_verificadas }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="editor_query" class="form-label fw-bold">Redactado por</label>

                                            <select name="editor_query" id="editor_query" class="form-control">
                                                <option value="%"
                                                    {{ request('editor_query') == '' ? 'selected' : '' }}>Todos
                                                </option>
                                                @foreach ($editor as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ request('editor_query') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->description }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="mt-3 row text-center align-items-center">
                                        <div class="col-2 text-start">
                                            <label class="fw-bold">Fecha de Separación</label>
                                        </div>

                                        <div class="col-1">

                                            <input type="date" name="separation_start"id="separation_start"
                                                class="form-control" value="{{ request('separation_start') }}">
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="separation_end"id="separation_end"
                                                class="form-control" value="{{ request('separation_end') }}">
                                        </div>


                                        <div class="col-2 text-start">
                                            <label class="fw-bold">Fecha Ingreso a Operaciones</label>
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="operation_start" class="form-control"
                                                value="{{ request('operation_start') }}">
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="operation_end" class="form-control"
                                                value="{{ request('operation_end') }}">
                                        </div>

                                        {{-- <div class="col-1 text-start">

                                    </div>
                                    <div class="col-1">
                                        <select name="date_reprog" id="date_reprog"
                                            class="form-control"onchange="activateInput_2();">
                                            <option value="" {{ request('date_reprog') == '' ? 'selected' : '' }}>
                                                Todo</option>
                                            <option value="Vence_hoy"
                                                {{ request('date_repro') == 'Vence_hoy' ? 'selected' : '' }}>Vence Hoy
                                            </option>
                                            <option value="Con Reprogramación"
                                                {{ request('date_reprog') == 'Con Reprogramación' ? 'selected' : '' }}>
                                                Con Reprogramación</option>
                                            <option value="Sin Reprogramación"
                                                {{ request('date_reprog') == 'Sin Reprogramación' ? 'selected' : '' }}>
                                                Sin Reprogramación</option>
                                            <option value="Segun_tramite"
                                                {{ request('date_reprog') == 'Segun_tramite' ? 'selected' : '' }}>Según
                                                el Trámite</option>
                                            <option value="Filtrar por Fecha"
                                                {{ request('date_reprog') == 'Filtrar por Fecha' ? 'selected' : '' }}>
                                                Filtrar por Fecha</option>
                                        </select>
                                    </div> --}}

                                        <div class="col-2 text-start">
                                            <label class="fw-bold ">Fecha Redactado</label>
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="rewritten_start" id="rewritten_start"
                                                class="form-control" value="{{ request('rewritten_start') }}">
                                        </div>
                                        <div class="col-1">

                                            <input type="date" name="rewritten_end"id="rewritten_end"
                                                class="form-control" value="{{ request('rewritten_end') }}">
                                        </div>


                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Recogido no devuelto</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="recogido_no_devuelto_start"
                                                id="recogido_no_devuelto_start" class="form-control"
                                                value="{{ request('recogido_no_devuelto_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date"
                                                name="recogido_no_devuelto_end"id="recogido_no_devuelto_end"
                                                class="form-control" value="{{ request('recogido_no_devuelto_end') }}">
                                        </div>
                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Fecha contrato firmado devuelto</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="f_contrato_firmado_devuelto_start"
                                                id="f_contrato_firmado_devuelto_start" class="form-control"
                                                value="{{ request('f_contrato_firmado_devuelto_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date"
                                                name="f_contrato_firmado_devuelto_end"id="f_contrato_firmado_devuelto_end"
                                                class="form-control"
                                                value="{{ request('f_contrato_firmado_devuelto_end') }}">
                                        </div>
                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Enviado a Archivo</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="enviado_archivo_start" id="enviado_archivo_start"
                                                class="form-control" value="{{ request('enviado_archivo_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="enviado_archivo_end"id="enviado_archivo_end"
                                                class="form-control" value="{{ request('enviado_archivo_end') }}">
                                        </div>
                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Fecha Desistimiento</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="f_desistimiento_start" id="f_desistimiento_start"
                                                class="form-control" value="{{ request('f_desistimiento_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="f_desistimiento_end"id="f_desistimiento_end"
                                                class="form-control" value="{{ request('f_desistimiento_end') }}">
                                        </div>
                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Fecha Notaría</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="notaria_start" id="notaria_start"
                                                class="form-control" value="{{ request('notaria_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="notaria_end"id="notaria_end" class="form-control"
                                                value="{{ request('notaria_end') }}">
                                        </div>
                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Fecha Chincha</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="chincha_start" id="chincha_start"
                                                class="form-control" value="{{ request('chincha_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="chincha_end"id="chincha_end" class="form-control"
                                                value="{{ request('chincha_end') }}">
                                        </div>
                                        <div class="col-2 mt-2 text-start">
                                            <label class="fw-bold ">Fecha Post Venta</label>
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="post_venta_start" id="post_venta_start"
                                                class="form-control" value="{{ request('post_venta_start') }}">
                                        </div>
                                        <div class="col-1 mt-2">

                                            <input type="date" name="post_venta_end"id="post_venta_end"
                                                class="form-control" value="{{ request('post_venta_end') }}">
                                        </div>
                                    </div>


                                    <div class="mt-3 row text-start align-items-center">

                                        <div class="col-12">
                                            <button type="submit" class="w-100 btn btn-success">Filtrar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>
                </form>
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
        <!-- Plantilla completamente adaptada con TODOS los campos de la migración -->


        <div class="modal fade" id="success-header-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4">Detalles de Expediente <b class="text-primary" id="customer_id"></b>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form role="form" id="Customer" name="Customer" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">

                        <div class="modal-body">
                            <div class="accordion" id="accordionCustomer">

                                <!-- Comercial -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingComercial">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseComercial" aria-expanded="true"
                                            aria-controls="collapseComercial">
                                            Comercial
                                        </button>
                                    </h2>
                                    <div id="collapseComercial" class="accordion-collapse collapse show"
                                        aria-labelledby="headingComercial" data-bs-parent="#accordionCustomer">
                                        <div class="accordion-body row">
                                            <div class="col-md-6 mb-3">
                                                <label for="project_id" class="form-label">Proyecto</label>
                                                <select id="project_id" name="project_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($Project as $item)
                                                        <option value="{{ $item->id }}">{{ $item->description }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="mz_lt" class="form-label">Mz - Lt</label>
                                                <input type="text" id="mz_lt" name="mz_lt"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="client_1" class="form-label">Cliente 1</label>
                                                <input type="text" id="client_1" name="client_1"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="dni_1" class="form-label">DNI 1</label>
                                                <input type="text" id="dni_1" name="dni_1"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="business_partners_id" class="form-label">Socio
                                                    Comercial</label>
                                                <select id="business_partners_id" name="business_partners_id"
                                                    class="form-control">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($business_partner as $item)
                                                        <option value="{{ $item->id }}">{{ $item->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="separation_date" class="form-label">Fecha de
                                                    Separación</label>
                                                <input type="date" id="separation_date" name="separation_date"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="separation_amount" class="form-label">Monto de
                                                    Separación</label>
                                                <input type="number" step="0.01" id="separation_amount"
                                                    name="separation_amount" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="assistant_id" class="form-label">Asistente</label>
                                                <select id="assistant_id" name="assistant_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}">{{ $item->firstname }}
                                                            {{ $item->lastname }} {{ $item->names }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="initial_paid" class="form-label">Inicial Pagada</label>
                                                <input type="number" step="0.01" id="initial_paid"
                                                    name="initial_paid" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="initial_payment_date" class="form-label">Fecha de
                                                    Inicial</label>
                                                <input type="date" id="initial_payment_date"
                                                    name="initial_payment_date" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="initial_amount" class="form-label">Monto de Inicial</label>
                                                <input type="number" step="0.01" id="initial_amount"
                                                    name="initial_amount" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Redacción -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingRedaccion">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseRedaccion"
                                            aria-expanded="false" aria-controls="collapseRedaccion">
                                            Redacción
                                        </button>
                                    </h2>
                                    <div id="collapseRedaccion" class="accordion-collapse collapse"
                                        aria-labelledby="headingRedaccion" data-bs-parent="#accordionCustomer">
                                        <div class="accordion-body row">
                                            <div class="col-md-6 mb-3"><label for="client_2" class="form-label">Cliente
                                                    2</label><input type="text" id="client_2" name="client_2"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="dni_2" class="form-label">DNI
                                                    2</label><input type="text" id="dni_2" name="dni_2"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="client_3" class="form-label">Cliente
                                                    3</label><input type="text" id="client_3" name="client_3"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="dni_3" class="form-label">DNI
                                                    3</label><input type="text" id="dni_3" name="dni_3"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="client_4" class="form-label">Cliente
                                                    4</label><input type="text" id="client_4" name="client_4"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="dni_4" class="form-label">DNI
                                                    4</label><input type="text" id="dni_4" name="dni_4"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="client_5" class="form-label">Cliente
                                                    5</label><input type="text" id="client_5" name="client_5"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="dni_5" class="form-label">DNI
                                                    5</label><input type="text" id="dni_5" name="dni_5"
                                                    class="form-control"></div>

                                            <div class="col-md-6 mb-3"><label for="operations_entry"
                                                    class="form-label">Ingreso a Operaciones</label>
                                                    <input type="date"
                                                    id="operations_entry" name="operations_entry" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3"><label for="days"
                                                    class="form-label">Días</label><input type="number" id="days"
                                                    name="days" class="form-control"></div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editors_id" class="form-label">Redactado Por</label>
                                                <select name="editors_id" id="editors_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    @foreach ($editor as $item)
                                                        <option value="{{ $item->id }}">{{ $item->description }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-6 mb-3"><label for="issue_date" class="form-label">Fecha
                                                    de Emisión</label><input type="date" id="issue_date"
                                                    name="issue_date" class="form-control"></div>
                                            <div class="col-md-12 mb-3"><label for="redaction_observations"
                                                    class="form-label">Observaciones de Redacción</label>
                                                <textarea id="redaction_observations" name="redaction_observations" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Aquí seguirán los otros grupos -->
                                <!-- Fedateador -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFedateador">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFedateador"
                                            aria-expanded="false" aria-controls="collapseFedateador">
                                            Fedateador
                                        </button>
                                    </h2>
                                    <div id="collapseFedateador" class="accordion-collapse collapse"
                                        aria-labelledby="headingFedateador" data-bs-parent="#accordionCustomer">
                                        <div class="accordion-body row">
                                            <div class="col-md-6 mb-3"><label for="contract_withdrawal_date"
                                                    class="form-label">Fecha Retiro Contrato</label><input type="date"
                                                    id="contract_withdrawal_date" name="contract_withdrawal_date"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="elapsed_days" class="form-label">Días
                                                    Transcurridos</label><input type="number" id="elapsed_days"
                                                    name="elapsed_days" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="returned_letters"
                                                    class="form-label">Letras Devueltas</label><input type="number"
                                                    id="returned_letters" name="returned_letters" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3"><label for="return_date" class="form-label">Fecha
                                                    Devolución</label><input type="date" id="return_date"
                                                    name="return_date" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="contract_type" class="form-label">Tipo
                                                    Contrato</label><input type="text" id="contract_type"
                                                    name="contract_type" class="form-control"></div>
                                            <div class="col-md-12 mb-3"><label for="regularization_observations"
                                                    class="form-label">Observaciones a Regularizar</label>
                                                <textarea id="regularization_observations" name="regularization_observations" class="form-control"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3"><label for="correction_delivery_day"
                                                    class="form-label">Día Entrega Correción</label><input type="date"
                                                    id="correction_delivery_day" name="correction_delivery_day"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="estimated_delivery_day"
                                                    class="form-label">Día Estimado Entrega</label><input type="date"
                                                    id="estimated_delivery_day" name="estimated_delivery_day"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="actual_delivery_day"
                                                    class="form-label">Fecha Entrega</label><input type="date"
                                                    id="actual_delivery_day" name="actual_delivery_day"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="regularized_contract_date"
                                                    class="form-label">Fecha Contrato Regularizado</label><input
                                                    type="date" id="regularized_contract_date"
                                                    name="regularized_contract_date" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="regularization_return_time"
                                                    class="form-label">Hora Devolución Regularización</label><input
                                                    type="time" id="regularization_return_time"
                                                    name="regularization_return_time" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="reception_time"
                                                    class="form-label">Hora Recepción</label><input type="time"
                                                    id="reception_time" name="reception_time" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="report_time" class="form-label">Hora
                                                    Reporte</label><input type="time" id="report_time"
                                                    name="report_time" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="elapsed_time"
                                                    class="form-label">Tiempo Transcurrido</label><input type="text"
                                                    id="elapsed_time" name="elapsed_time" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="indicator"
                                                    class="form-label">Indicador</label><input type="text"
                                                    id="indicator" name="indicator" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="delivered_to_operations_2"
                                                    class="form-label">Entregado Operaciones 2</label>
                                                    <select
                                                    id="delivered_to_operations_2" name="delivered_to_operations_2"
                                                    class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select></div>
                                            <div class="col-md-12 mb-3"><label for="observations"
                                                    class="form-label">Observaciones</label>
                                                <textarea id="observations" name="observations" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Desistimiento -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingDesistimiento">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseDesistimiento"
                                            aria-expanded="false" aria-controls="collapseDesistimiento">
                                            Desistimiento
                                        </button>
                                    </h2>
                                    <div id="collapseDesistimiento" class="accordion-collapse collapse"
                                        aria-labelledby="headingDesistimiento" data-bs-parent="#accordionCustomer">
                                        <div class="accordion-body row">
                                            <div class="col-md-6 mb-3"><label for="cancellation_request_type"
                                                    class="form-label">Tipo de Solicitud</label><input type="text"
                                                    id="cancellation_request_type" name="cancellation_request_type"
                                                    class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="cancellation_date"
                                                    class="form-label">Fecha de Cancelación</label><input type="date"
                                                    id="cancellation_date" name="cancellation_date" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3"><label for="cancelled_by"
                                                    class="form-label">Cancelado por</label><input type="text"
                                                    id="cancelled_by" name="cancelled_by" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="physical_contract"
                                                    class="form-label">Contrato Físico</label><select
                                                    id="physical_contract" name="physical_contract" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select></div>
                                            <div class="col-md-6 mb-3"><label for="phone"
                                                    class="form-label">Teléfono</label><input type="text"
                                                    id="phone" name="phone" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="email"
                                                    class="form-label">Correo</label><input type="email" id="email"
                                                    name="email" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="signed_agreement"
                                                    class="form-label">Acuerdo Firmado</label><select
                                                    id="signed_agreement" name="signed_agreement" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select></div>
                                            <div class="col-md-6 mb-3"><label for="receipts"
                                                    class="form-label">Boletas</label><select id="receipts"
                                                    name="receipts" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select></div>
                                            <div class="col-md-6 mb-3"><label for="operation_type"
                                                    class="form-label">Tipo de Operación</label><input type="text"
                                                    id="operation_type" name="operation_type" class="form-control"></div>
                                            <div class="col-md-6 mb-3"><label for="observation"
                                                    class="form-label">Observación</label>
                                                <textarea id="observation" name="observation" class="form-control"></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3"><label for="lot_status" class="form-label">Estado
                                                    de Lote</label><input type="text" id="lot_status"
                                                    name="lot_status" class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tesorería - Archivo -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTesoreria">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTesoreria"
                                            aria-expanded="false" aria-controls="collapseTesoreria">
                                            Tesorería - Archivo
                                        </button>
                                    </h2>
                                    <div id="collapseTesoreria" class="accordion-collapse collapse"
                                        aria-labelledby="headingTesoreria" data-bs-parent="#accordionCustomer">
                                        <div class="accordion-body row">
                                            <div class="col-md-6 mb-3">
                                                <label for="commission_paid" class="form-label">Comisión Pagada</label>
                                                <select id="commission_paid" name="commission_paid" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="contract_scanned" class="form-label">Contrato
                                                    Escaneado</label>
                                                <select id="contract_scanned" name="contract_scanned"
                                                    class="form-control">
                                                    <option value="">Seleccione</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!-- Estado -->
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingState">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseState"
                                            aria-expanded="false" aria-controls="collapseState">
                                            Estado
                                        </button>
                                    </h2>
                                    <div id="collapseState" class="accordion-collapse collapse"
                                        aria-labelledby="headingState" data-bs-parent="#accordionCustomer">
                                        <div class="accordion-body row">
                                            <div class="col-md-12 mb-3">
                                                <label for="state_id" class="form-label">Estado</label>
                                                <select id="state_id" name="state_id" class="form-control">
                                                    <option value="">Seleccione</option>
                                                  @foreach ($state as $item)
                                                  <option value="{{$item->id}}">{{$item->description}}</option>
                                                  @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <input type="button" value="Nuevo" class="btn w-100 btn-primary"
                                        onclick="New();$('#Customer')[0].reset();" name="new">
                                </div>
                                <div class="col-3">
                                    <input type="button" value="Guardar"
                                        class="w-100 btn bg-success-subtle text-success" onclick="CustomerStore()"
                                        id="create">
                                </div>
                                <div class="col-3">
                                    <input type="button" value="Modificar"
                                        class="w-100 btn bg-danger-subtle text-danger" onclick="CustomerUpdate();"
                                        id="update">
                                </div>
                                <div class="col-3">
                                    <button type="button" class="w-100 btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>







        <!-- /.modal -->
    </div>
@endsection
