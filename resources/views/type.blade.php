@extends('template')
@section('content')


                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1 style="font-family:Montserrat-Bold">Tipos</h1>
                                            {{ session('success') }}
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                                <li class="breadcrumb-item active" style="color:#1b3d6d">Tipos</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>
                            <!-- Button trigger modal -->
                            <button type="button"style="border-radius:20px;background-color:#023039;color:white" class="btn" data-toggle="modal"
                            data-target="#exampleModal"
                            onclick="New();$('#type')[0].reset();">
                            <span style="font-family: Montserrat-Bold;font-size:15px">+</span> Agregar
                        </button>
                            <p></p>
                     

                            <p></p>
                             <!-- /.content -->
                             {{-- {{ $type->onEachSide(5)->links() }} --}}
                            <div id="mycontent">
                                @include("typetable")
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"style="font-color:#1b3d6d;font-family:Montserrat-Bold"style="font-color:#1b3d6d;font-family:Montserrat-Bold">Mantenimiento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" role="form" id="type" name="form">
                                                <input type="hidden" name="id" id="id">
                                                {{ csrf_field() }}
                                          Descripción :      <input type="text" name="description" id="description"
                                                    class="form-control">
                                                    Detalle :      <input type="text" name="detail" id="detail"
                                                    class="form-control">


                                        </div>
                                        <div class="modal-footer"style="font-family:Montserrat-Bold">
                                            <input type="button" value="Nuevo" class="btn" style="font-family:Montserrat-SemiBold;background-color:#023039;color:#ffffff"
                                                onclick="New();$('#type')[0].reset();" name="new">
                                            @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn btn-success"id="create"
                                                onclick="typeStore()" name="create">@endcanany
                                            <input type="button" value="Modificar" class="btn btn-danger"id="update"
                                                onclick="typeUpdate();" name="update">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


@endsection
