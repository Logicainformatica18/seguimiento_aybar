@extends('template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header" style="font-family:Montserrat-Regular;">

        <p></p>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col col-sm-12 col-md-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color:#1b3d6d">Usuarios</li>
                    </ol>
                </div>
            </div>
            <div class="row mb-2">



                <div class="col col-lg-2 col-md-4 col-sm-12">
                    <h1 style="font-family:Montserrat-Bold;color:#1b3d6d">Usuarios</h1>
                    {{ session('success') }}
                </div>

                <div class="col col-lg-10 col-md-8 col-sm-12">
                    <button type="button"style="border-radius:20px;background-color:#023039;color:white;width:150px"
                        class="btn" data-toggle="modal" data-target="#exampleModal"
                        onclick="New();$('#user')[0].reset();">
                        <span style="font-family: Montserrat-Bold;font-size:15px">+</span> Agregar
                    </button>

                </div>



            </div>
            <p></p>
            <div class="row mb-2">
                <div class="col-12" id="accordion">
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    Importar Desde Excel
                                    <img src="https://cdn.pixabay.com/photo/2023/06/01/12/02/excel-logo-8033473_640.png"
                                        alt=""width="50px">
                                </h4>





                            </div>
                        </a>
                        <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                            <div class="card-body">




                                <form action="{{ route('users.import') }}"name="import_excel" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" class="form-control"
                                            accept=".xlsx" >
                                        <label class="custom-file-label" for="customFile">Adjuntar Excel .xlsx</label>
                                    </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ml-3">
                                <button name="import_button" 
                                    class="btn btn-success"style="border-radius:20px">Importar Documento</button>
                                <p></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row mb-0">

                <div class="col-12" id="accordion1">
                    <div class="card card-warning card-outline">
                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne1" aria-expanded="false">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    Importar Desde Google Sheets
                                    <img src="https://qualitytraining.be/content/uploads/2022/07/formation-google-sheet-belgique.png"
                                        alt=""width="50px">
                                </h4>





                            </div>
                        </a>
                        <div id="collapseOne1" class="collapse" data-parent="#accordion1" style="">
                            <div class="card-body">


                                <span>ID Google Sheet:</span>
                                <input id="id_sheet" type="text"class="form-control" width="100%"
                                    placeholder="ejem: 1ShgVLdsBMDAW2v4Xzk3JL8xls0KlKUEUMzY5mlTvwds"
                                    value="1hoWjx5VabJ-zkqm0Q58KzguawIXE-RIZCRAd5Whajtk">

                                <form action="{{ route('users.import') }}"name="import_excel" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                   


                                    Rango:
                                    <input id="range" type="text"class="form-control" width="100%" placeholder="ejem: hoja1!A1:D10"
                                        value="hoja!A1:H10">






                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12 ml-3">
                                <button type="button"class="btn btn-success" style="border-radius:20px" class="btn"
                        onclick='userImportGoogle()'>
                        <span style="font-family: Montserrat-Bold;font-size:15px">+</span> Importar Google
                    </button>
                                <p></p>
                           
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- Button trigger modal -->

    



    <!-- /.content -->
    {{-- {{ $user->onEachSide(1)->links() }} --}}
    <p></p>
    <div id="mycontent">
        
        @include('usertable')
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"style="font-color:#1b3d6d;font-family:Montserrat-Bold"
                        style="font-color:#1b3d6d;font-family:Montserrat-Bold">Mantenimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form name="f_1"id="f_1">

                    </form>
                    <form action="" method="post" role="form" id="user" name="user"enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        {{ csrf_field() }}

                        Dni<input name="dni" type="number" class="form-control"value="99999999">
                        Paterno<input name="firstname" type="text" class="form-control">
                        Materno<input name="lastname" type="text" class="form-control">
                        Nombres<input name="names" type="text" class="form-control">
                        Celular<input type="number" name="cellphone" class="form-control"value="99999999">
                        Email<input type="text" name="email" class="form-control">
                        Contraseña<input type="password" name="password" class="form-control"value="12345678">
                        Sexo
                        <div class="container">
                            <div class="row ">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input class="form-check-input" type="radio" name="sex" id="M"
                                        value="M" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                    <input class="form-check-input" type="radio" name="sex" id="F"
                                        value="F">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        Fecha de Nacimiento :
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
                                    }
                                    ?>
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
                            </div>
                        </div>
                        <p></p>
                        <div class="container align-content-center">
                            <div class="form-group row">
                                Fotografía
                                <div class="col-sm-1"></div>
                                <div class="btn btn-default btn-file col-9">
                                    <i class="fas fa-paperclip"></i> Subir
                                    <input type='file' id="imgInp" name="photo"
                                        onchange="readImage(this,'#blah');">
                                </div>


                            </div>
                            <div class="size-100">
                                <br>
                                <img id="blah" name="fotografia" src="https://placehold.co/150" alt="Tu imagen"
                                    class="img-bordered" width="100%">
                            </div>
                        </div>



                </div>
                <div class="modal-footer"style="font-family:Montserrat-Bold">
                    <input type="button" value="Nuevo" class="btn"
                        style="font-family:Montserrat-SemiBold;background-color:#023039;color:#ffffff"
                        onclick="New();$('#user')[0].reset();"   name="new">
                    @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn btn-success" onclick="userStore()" id="create">@endcanany
                    <input type="button" value="Modificar" class="btn btn-danger" onclick="userUpdate();"
                        id="update">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"style="font-color:#1b3d6d;font-family:Montserrat-Bold">
                        Gestionar Roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" id="user_role" name="form">
                        <input type="hidden" name="id">
                        {{ csrf_field() }}
                        Roles :
                        <select name="role" id="" class="form-control">
                            @foreach ($roles as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <input type="button" style="color:#ffffff;background-color:#023039;font-family:Montserrat-Bold"
                            value="Agregar" class="btn" onclick="userRoleStore()" name="create">@endcanany


                        <div id="mycontent_detail">
                            @if (isset($user->roles_) == null)
                            @else
                                @include('user_roletable')
                            @endif

                        </div>



                </div>
                <div class="modal-footer"style="font-family:Montserrat-Bold">


                    <button type="button" class="btn"
                        style="font-family:Montserrat-SemiBold;background-color:#023039;color:#ffffff"
                        data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
