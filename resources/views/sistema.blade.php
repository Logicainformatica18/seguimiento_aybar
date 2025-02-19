@extends('template')
@section('content')
<p></p>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h2><b style="font-family: Montserrat-Bold;color:#023039">Hola, {{ Auth::user()->names }}.
                            ¡Bienvenido(a)! </b></h2>
                    {{ session('success') }}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color:#1b3d6d">Perfil</li> --}}
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <style>
        .callout.callout-custom {

            border-left-color: #023039;
            /* Color celeste para la barra lateral */
            color: #1b3d6d;
            /* Color de texto (opcional) */
        }
    </style>
    <div class="callout callout-custom" style="font-family: Montserrat-Medium;border-radius:50px;font-size:13px">
        <h5 class="ml-3">
            {{-- <i class="fas fa-info"></i> --}}
            Da un salto en tu carrera profesional con nuestra plataforma de aprendizaje:
        </h5>
        <p class="ml-3">
            Nuestra plataforma Learning está aquí para ayudarte a mejorar la emisión de certificados, brindando un flujo de
            trabajo más efectivo y práctico
            para toda nuestra comunidad.
        </p>
    </div>
    <div class="row container">
        <div class="col-lg-7 card card-widget widget-user-2"style="border-top-left-radius:50px;border-bottom-left-radius:50px">

            <div class="widget-user-header bg-white">
                <div class="widget-user-image">

                    {{-- <img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="User Avatar"> --}}

                    @if ($users->photo == '' && $users->sex == 'M')
                        <img class="img-circle elevation-1" src="Recurso 23.png" alt="User Avatar">
                    @elseif($users->photo == '' && $users->sex == 'F')
                        <img class="img-circle elevation-2" src="Recurso 23.png" alt="User Avatar">
                    @else
                        <img src="imageusers/{{ $users->photo }}" class="img-circle elevation-2" alt='User Avatar'>
                    @endif
                </div>

                <h3 class="widget-user-username"><b style="font-family:Montserrat-Bold;color:#023039">{{ Auth::user()->names }}</b> </h3>
                <h5 class="widget-user-desc" style="font-family:Montserrat-Medium;color:#1b3d6d;font-size:15px;margin-top:-5px">
                    @foreach (Auth::user()->roles_ as $roless)
                        {{ $roless->name }}
                    @endforeach
                </h5>

            </div>

        </div>
        <div class="col-lg-3" >
            <!-- Botón para abrir la modal -->
            <button type="button"style="background-color: #023039;width:100%;height:87%;
            border-top-right-radius:50px;border-bottom-right-radius:50px;margin-left:-12px;font-family:Montserrat-Bold;font-size:20px"
             class="btn btn-primary" data-toggle="modal" data-target="#miModal">
                Editar Datos
            </button>
        </div>
    </div>

<p></p>

    <div id="mycontent">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <h5><b style="font-family:Montserrat-Bold;color:#023039">&nbsp;&nbsp; Información Básica</b></h5>
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline" id="mycontent">
                            <div class="card-body box-profile" style="font-size: 12px">



                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Nombre completo</b> <a class="float-right">{{ $users->firstname }}
                                            {{ $users->lastname }}
                                            {{ $users->names }}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Dirección de correo</b> <a class="float-right">{{ $users->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">DNI</b> <a class="float-right">{{ $users->dni }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">ID</b> <a class="float-right">ONEDIGITAL00{{ $users->id }}</a>
                                    </li>




                                </ul>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <h5><b style="font-family:Montserrat-Bold;color:#023039">&nbsp;&nbsp; Información Adicional</b></h5>
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline" id="mycontent">
                            <div class="card-body box-profile" style="font-size: 12px">



                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Sexo</b>
                                        @if ($users->sex == 'M')
                                            <a class="float-right">Masculino</a>
                                        @else
                                            <a class="float-right">Femenino</a>
                                        @endif

                                    </li>



                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Fecha de nacimiento</b> <a class="float-right">{{ $users->datebirth }}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Celular</b> <a class="float-right">{{ $users->cellphone }}</a>
                                    </li>
                                    {{-- <li class="list-group-item">
                                        <b>Nacimiento</b> <a class="float-right">{{ $users->datebirth }}</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>

                    {{-- <div class="col-md-12">
                        <h5><b style="font-family:Montserrat-Bold;color:#023039">&nbsp;&nbsp; Información Laboral</b></h5>
                        
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline" id="mycontent">
                            <div class="card-body box-profile" style="font-size: 12px">

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Cargo</b>
                                        <a class="float-right">Socio Comercial</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="font-family:Montserrat-SemiBold">Experiencia</b> <a class="float-right">{{ $users->datebirth }}</a>
                                    </li>


                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div> --}}












                    <!-- Ventana Modal -->
                    <div class="modal fade" id="miModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Datos</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form accept-charset="utf-8" id="user" method="POST" action=""
                                        enctype="multipart/form-data" name="user">
                                        <input type="hidden"name="id" id="id" value="{{ $users->id }}">
                                        @csrf


                                        Nombres :
                                        <input type="text"value="{{ $users->names }}" name="names"id="names"
                                            class="form-control">
                                        Paterno :
                                        <input type="text"value="{{ $users->firstname }}" class="form-control"
                                            name="firstname"id="firstname">
                                        Materno :
                                        <input type="text"value="{{ $users->lastname }}"
                                            class="form-control"name="lastname" id="lastname">
                                        Celular :
                                        <input type="text"value="{{ $users->cellphone }}"
                                            class="form-control"name="cellphone" id="cellphone">
                                        Dni :
                                        <input type="text"value="{{ $users->dni }}" class="form-control"name="dni"
                                            id="dni">
                                        Sexo:
                                        <p></p>

                                        @if ($users->sex == 'M')
                                            <div class="row">
                                                <div class="col col-lg-6">
                                                    Masculino
                                                    <input type="radio"name="sex" id="sex"value="M" checked>
                                                </div>
                                                <div class="col col-lg-6">
                                                    Femenino
                                                    <input type="radio"name="sex" id="sex"value="F">
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col col-lg-6">
                                                    Masculino
                                                    <input type="radio"name="sex" id="sex"value="M">
                                                </div>
                                                <div class="col col-lg-6">
                                                    Femenino
                                                    <input type="radio"name="sex" id="sex"value="F" checked>
                                                </div>
                                            </div>
                                        @endif

                                </div>
                                <div class="modal-footer"style="font-family:Montserrat-Bold">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="userUpdateProfile()">Guardar
                                        Cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>















                    <div class="col-md-12">
                        <div class="card">
                            <form accept-charset="utf-8" id="user2" method="POST" action=""
                                enctype="multipart/form-data" name="user2">
                                <input type="hidden" name="id"value="{{ $users->id }}">

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="settings">
                                            <div class="form-group row">
                                                <label for="inputEmail"
                                                    class="col-sm-2
                                            col-form-label">Fotografía</label>
                                                <div class="btn btn-default btn-file col-10">
                                                    <i class="fas fa-paperclip"></i> Subir
                                                    <input type='file' id="imgInp" name="photo"
                                                        onchange="readImage(this,'#blah');">
                                                </div>
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-8">
                                                    <br>
                                                    <img id="blah" src="https://placehold.co/150"
                                                        alt="Tu imagen" class="img-bordered" width="200">
                                                </div>
                                            </div>

                                           
                                            <div class="form-group row">
                                                <label for="inputdatebirth"
                                                    class="col-sm-2
                                            col-form-label">Nacimiento</label>
                                                <div class="col-sm-10">

                                                    <div class="row">
                                                        <div class="col s4">


                                                            <select name="day" class="form-control">
                                                                <option>Dia</option>
                                                                <?php for ($a = 1; $a <= 31; $a++) {
                                                                    echo "<option value='$a'>" . $a . '</option>';
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="col s4">
                                                            <select name="month" class="form-control">
                                                                <option>Mes</option>
                                                                <?php
                                                                $mes = ['', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
                                                                for ($b = 1; $b <= 12; $b++) {
                                                                    echo "<option value='$b'>" . $mes[$b] . '</option>';
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col s4">
                                                            <select name="year" class="form-control">
                                                                <option>Año</option>
                                                                <?php
                                                                $c = 2020;
                                                                while ($c >= 1905) {
                                                                    echo "<option value='$c'>" . $c . '</option>';
                                                                    $c = $c - 1;
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php echo '<script> user.day.value=' . substr($users->datebirth, 8, 2) . ';</script>'; ?>
                                                            <?php echo '<script> user.month.value=' . substr($users->datebirth, 5, 2) . ';</script>'; ?>
                                                            <?php echo '<script> user.year.value=' . substr($users->datebirth, 0, 4) . ';</script>'; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="button" class="btn"
                                                    style="font-size:13px;font-family:Montserrat-Bold; color:white;background: linear-gradient(to right,#023039,#0d0d0e);"
                                                        onclick="userUpdateProfile();">Guardar cambios</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
