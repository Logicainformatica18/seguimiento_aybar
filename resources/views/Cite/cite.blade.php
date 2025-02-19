@extends('template_no_login')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <form action=""id="cite_filter">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-sm-flex align-items-center justify-space-between">
                                <h1 class="text-primary">Citas</h1>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{ url('citas/Todos') }}" class="btn btn-warning ">Todos <b
                                        class="fs-4">{{ $total_cite }}</b> </a>
                                <a target="_blank" href="{{ url('citas/Pendiente') }}" class="btn btn-success">
                                    Pendiente
                                    <b class="fs-4">{{ $total_pendiente }}</b>
                                </a>
                                <a target="_blank" href="{{ url('citas/Proceso') }}"
                                    class="btn text-white "style="   background-color: #6f42c1">
                                    Proceso
                                    <b class="fs-4">{{ $total_proceso }}</b>
                                </a>
                                <a target="_blank" href="{{ url('citas/Atendido') }}" class="btn bg-info text-white">
                                    Atendido
                                    <b class="fs-4">{{ $total_atendido }}</b>
                                </a>
                                <a target="_blank" href="{{ url('citas/Derivado') }}" class="btn btn-secondary">
                                    Derivado
                                    <b class="fs-4">{{ $total_derivado }}</b>
                                </a>
                                <a target="_blank" href="{{ url('citas/Observado') }}" class="btn btn-danger">
                                    Observado
                                    <b class="fs-4">{{ $total_observado }}</b>
                                </a>
                                <a target="_blank" href="{{ url('citas/Finalizado') }}" class="btn text-black"
                                    style="background-color: #e7e7e7">
                                    Finalizado
                                    <b class="fs-4">{{ $total_finalizado }}</b>
                                </a>
                                <a target="_blank" href="{{ url('citas/Cerrado') }}" class="btn btn-dark">
                                    Cerrado
                                    <b class="fs-4">{{ $total_cerrado }}</b>
                                </a>
                                <p></p>


                                <nav aria-label="breadcrumb" class="ms-auto">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item d-flex align-items-center">
                                            <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                                <iconify-icon icon="solar:home-2-line-duotone"
                                                    class="fs-6"></iconify-icon>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                                Citas
                                            </span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Datos de la Cita
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <!-- Primera Fila -->
                                <div class="row text-center">
                                    <div class="col-4">
                                        <label for="motivo" class="form-label fw-bold">Motivo</label>
                                        <select name="motivo" id="motivo" class="form-control">
                                            <option value="" disabled selected>Seleccione un Motivo</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="area" class="form-label fw-bold">Área</label>
                                        <select name="area" id="area" class="form-control">
                                            <option value="" disabled selected>Seleccione un Área</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="restante" class="form-label fw-bold">Días Restantes</label>
                                        <select name="restante" id="restante" class="form-control">
                                            <option value="" disabled selected>Seleccione Días Restantes</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Fechas -->
                                <div class="row text-center py-3">
                                    <h6 class="fw-bold">Fechas</h6>
                                </div>

                                <div class="row text-center align-items-center">
                                    <div class="col-4">
                                        <label class="fw-bold">Fecha de Cita</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="date" name="date_start" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="date" name="date_end" class="form-control">
                                    </div>
                                </div>

                                <div class="row text-center align-items-center py-2">
                                    <div class="col-4">
                                        <label class="fw-bold">Fecha de Reprogramación</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="date" name="date_start_reprog" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="date" name="date_end_reprog" class="form-control">
                                    </div>
                                </div>

                                <div class="row text-center align-items-center py-2">
                                    <div class="col-4">
                                        <label class="fw-bold">Fecha Generada</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="date" name="date_start_gen" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="date" name="date_end_gen" class="form-control">
                                    </div>
                                </div>

                                <!-- Horas -->
                                <div class="row text-center py-3">
                                    <h6 class="fw-bold">Horas</h6>
                                </div>

                                <div class="row text-center align-items-center">
                                    <div class="col-4">
                                        <label class="fw-bold">Hora de Cita</label>
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Inicio</label>
                                        <input type="time" name="time_start" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label class="fw-bold">Fin</label>
                                        <input type="time" name="time_end" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                </form>
            </div>

            <div class="datatables">

                <!-- start File export -->
                <div class="card">
                    <div class="card-body">

                        <p class="card-subtitle ">

                            <!-- success header modal -->
                            {{-- @canany(['administrar', 'agregar'])
                            <button type="button" class="btn mb-1 me-1 btn-success"
                                data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                 onclick="New();$('#cite')[0].reset();">
                                Agregar
                            </button>
                            @endcanany --}}
                        </p>
                        <div class="mb-2">



                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive"id="mycontent">



                            @include('Cite.citetable')

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
                            {{ $cite->links() }}
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
        <div id="success-header-modal1" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success text-white">
                        <h4 class="modal-title text-white" id="success-header-modalLabel">
                            Citas
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="post" role="form" id="cite"
                            name="cite"enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}

                            Descripción : <input type="text" name="description" id="description" class="form-control">

                            Detalle : <input type="text" name="detail" id="detail" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Nuevo" class="btn btn-primary" onclick="New();$('#cite')[0].reset();"
                            name="new">
                        {{-- @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn bg-success-subtle text-success "
                            onclick="citeStore()" id="create">@endcanany
                            @canany(['administrar', 'actualizar'])
                        <input type="button" value="Modificar" class="btn bg-danger-subtle text-danger" onclick="citeUpdate();"
                            id="update">
                            @endcanany --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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

    <!-- /.modal----------------------------------------------------------------------------------------------- -->

    <div class="modal fade" id="success-header-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="exampleModalFullscreenLabel">
                        Detalles de la Cita
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex row" style="justify-content: space-evenly;">

                    <div class="row col-md-11
              "
                        style="margin-left: 0; margin-right: 0; border-right: 1px solid #ededed; box-shadow:0px 0px 5px -1px #a7a7a7; border-radius: 12px; height: 160vh;">

                        <div class="d-flex align-items-center mb-3" style="border-radius: 12px; color:#000; ">
                            <h4 class="mb-4 mb-md-0 card-title">Atención al Cliente</h4>
                        </div>

                        <div class="col-md-12">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Detalle de
                                Cita</label>
                            <li class="d-flex align-items-center gap-2">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="descripcion"></span>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Codigo</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="codigo"></span>
                                <!-- valor aqui-->
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Hora de
                                Cita</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="hora_cita"></span>
                                <button class="btn btn-primary w-10 ti ti-clock-hour-1 fs-3" id="aumentarh"></button>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Motivo</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="motivo"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Manzana</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="manzana"></span>
                            </li>
                            <div id="arealegal" style="display: none;">
                                <label for=""
                                    class="control-label border-bottom border-primary custom-cursor-default-hover mb-2">¿Confirmar
                                    cita?</label>
                                <li class="d-flex align-items-center gap-2">
                                    <input class="form-check-input success fs-4" type="checkbox" id="confirmar">
                                </li>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Razón
                                Social</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="razon_social"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha de
                                Cita</label>
                            <li class="d-flex align-items-center gap-2 mb-3">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="fecha_cita"></span>
                                <button class="btn btn-primary w-10 ti ti-calendar-plus fs-3" id="aumentar"></button>

                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Encargado</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="encargado"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Lote</label>
                            <li class="d-flex align-items-center gap-2">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="lote"></span>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">DNI/CE</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="dni"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Hora de Cita
                                creada</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="hora_creada"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Tipo</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="tipo"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha
                                Reprogramada</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="fecha_repro"></span>
                            </li>
                        </div>
                        <div class="col-md-3">
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Teléfono</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="telefono"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Fecha de
                                Cita creada</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="fecha_creada"></span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Archivo
                                Adjuntado</label>
                            <li class="d-flex align-items-center gap-2 mb-4">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="archivo" class="text-primary" style="cursor: pointer;">Ver</span>
                            </li>
                            <label for=""
                                class="control-label border-bottom border-primary custom-cursor-default-hover">Hora
                                Reprogramada</label>
                            <li class="d-flex align-items-center gap-2">
                                <span class="p-1 rounded-circle text-bg-primary"></span>
                                <span id="hora_repro"></span>
                            </li>
                        </div>
                        <div class="row border-bottom border-primary mb-4"
                            style="padding-bottom: 4vh; margin-left: 0; margin-right: 0;">
                            <div class="d-flex" style="justify-content: flex-end; height: 5vh;">
                                <button class="btn btn-primary" id="actualizarBtn">Actualizar Cita</button>
                            </div>

                            {{-- @if ($id_rol == 3):
                            <div class="d-flex" style="padding: 0; align-items:flex-end;">
                                <div class="d-flex" style="flex-direction: column; margin-right: 6px;">
                                    <label class="control-label custom-cursor-default-hover"
                                        id="titulo-derivacion">Descripción de Solicitud de Derivación</label>
                                    <textarea id="mensaje-derivacion" class="form-control"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-success" id="derivar-jefe" style="margin-right: 4px;">Derivar
                                        a Jefe</button>
                                    <button class="btn btn-warning" id="enviar-jefe">Enviar</button>
                                </div>
                            </div>
                             @endif --}}

                            <div class="d-none" id="contenedor-texto">
                                <hr>
                                <label for="control-label" style="padding:0px; margin-bottom: 6px;">Comentario de Petición
                                    de Derivación</label>
                                <div class="col-md-6 col-lg-3" style="padding:0px;">
                                    <div class="card"
                                        style="box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.11); margin-bottom: 0px;">
                                        <div class="card-body" style="margin-bottom: 0px;">
                                            <!--<h5 class="card-title">James Smith</h5>-->
                                            <p class="card-text" id="texto-derivacion"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="estado_desc mb-2">

                            <label for="control-label" style="color: #000; margin-bottom: 2vh;">¿En qué estado se
                                encuentra la Cita generada?</label>
                            <select class="form-control mb-4" id="estado">
                                <option selected disabled>Seleccione el Estado</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Proceso">Proceso</option>
                                <option value="Atendido">Atendido</option>
                                <option value="Observado">Observado</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Cerrado">Cerrado</option>
                            </select>

                            <label for="control-label" style="color: #000; margin-bottom: 2vh;">Comentario</label>
                            <textarea class="form-control" rows="6" name="comentario_pendiente" id="comentario_pendiente"
                                style="display: none;"></textarea>
                            <textarea class="form-control" rows="6" name="comentario_proceso" id="comentario_proceso"
                                style="display: none;"></textarea>
                            <textarea class="form-control" rows="6" name="comentario_atendido" id="comentario_atendido"
                                style="display: none;"></textarea>
                            <textarea class="form-control" rows="6" name="comentario_finalizado" id="comentario_finalizado"
                                style="display: none;"></textarea>
                            <textarea class="form-control" rows="6" name="comentario_cerrado" id="comentario_cerrado"
                                style="display: none;"></textarea>
                            <textarea class="form-control" rows="6" name="comentario_observado" id="comentario_observado"
                                style="display: none;"></textarea>
                            <textarea class="form-control" rows="6" name="comentario_derivado" id="comentario_derivado"
                                style="display: none;"></textarea>

                        </div>

                        <div class="row mb-3" id="comentariosContainer"
                            style="overflow-y: auto; height: 38vh; box-shadow: 0px 1px 5px -1px #a7a7a7; background: white; padding: 0; margin: 0;">

                        </div>






                        {{-- @if ($id_rol == 1 || $id_rol == 3 || $id_rol == 4 || $id_rol == 5):

                        <label for="control-label" style="color: #000; margin-top: 2vh; margin-bottom: 2vh;">Comentario de Jefe</label>
                        <div class="col-md-12 single-note-item all-category note-important">
                          <div class="card card-body" style="box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.12);">
                            <span class="side-stick"></span>
                            <div class="note-content">
                              <p class="note-inner-content" id="comentario_jefe2"></p>
                            </div>
                          </div>
                        </div>


                   @endif --}}

                        <div class="d-flex" style="justify-content:space-between">
                            <div>
                                <button type="button" class="btn bg-success-subtle text-success fs-5" id="guardarBtn"
                                    style="margin-right: 2vh; height: 5vh;">
                                    Guardar
                                </button>

                                <button type="button" class="btn bg-danger-subtle text-danger fs-5"
                                    data-bs-dismiss="modal" style="margin-right: 2vh; height: 5vh;">
                                    Cerrar
                                </button>
                            </div>
                        </div>

                    </div>


                    @php
                        //   $id_rol = $_SESSION['id_rol'];
                        //   $id_usuario = $_SESSION['id_usuario'];
                        //   $id_area = $_SESSION['id_area'];
                    @endphp
                    {{-- @if ($id_rol == 4 || $id_usuario == 51 || $id_usuario == 31 || $id_usuario == 38 || $id_area == 7)
                        :
                        <div class="border-bottom border-top"
                            style="margin-top: 10vh; padding: 3vh 1vh 3vh 1vh; box-shadow: 0px 2px 5px -1px#dbdbdb; border-radius:12px;">
                            <h4>Enviar registro a:</h4>
                            <div class="d-flex" style="justify-content: space-between;">
                                <div>
                                    <button type='button' class='btn bg-info-subtle text-info d-flex align-items-center'
                                        id="retornar1">
                                        Retornar
                                    </button>
                                </div>
                                <div style="display: flex; flex-direction: column;">
                                    <button type='button' class='btn bg-info-subtle text-info' id="derivar">
                                        Otras áreas
                                    </button>
                                    <div class="form-group mb-4" id="contenedor-derivar">
                                        <label class="form-label mb-2">¿A qué motivo pertenece?</label>
                                        <select class="form-select mr-sm-2" id="ListarMotivo1">
                                        </select>
                                        <div class="d-flex justify-content-end" style="margin-top: 4px;">
                                            <button class="btn bg-success-subtle text-success" id="saveRedicMotivo1">
                                                Aceptar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn bg-info-subtle text-info" id="backoffice1">
                                        BackOffice
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn bg-info-subtle text-info" id="archivo1">
                                        Archivo
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif --}}


                </div>

            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    </div>
@endsection
