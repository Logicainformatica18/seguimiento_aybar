@extends('template')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <p></p><div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:Montserrat-Bold;color:#1b3d6d">Roles ó Cargos</h1>
                    {{ session('success') }}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color:#1b3d6d">Roles ó Cargos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <button type="button"style="border-radius:20px;background-color:#023039;color:white" class="btn" data-toggle="modal"
    data-target="#exampleModal"
    onclick="New();$('#role')[0].reset();">
    <span style="font-family: Montserrat-Bold;font-size:15px">+</span> Agregar
</button>
  <!-- /.content -->
  {{-- {{ $role->onEachSide(5)->links() }} --}}
    <p></p>
    <div id="mycontent">
        @include("roletable")
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"style="font-color:#1b3d6d;font-family:Montserrat-Bold"style="font-color:#1b3d6d;font-family:Montserrat-Bold">Mantenimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" id="role" name="form">
                        <input type="hidden" name="id" id="id">
                        {{ csrf_field() }}
                        Nombre : <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="modal-footer"style="font-family:Montserrat-Bold">
                    <input type="button" value="Nuevo" class="btn" style="font-family:Montserrat-SemiBold;background-color:#023039;color:#ffffff" onclick="New();$('#role')[0].reset();"
                        name="new">
                    @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn btn-success" id="create" onclick="roleStore()"
                        name="create">@endcanany
                    <input type="button" value="Modificar" class="btn btn-danger" id="update" onclick="roleUpdate();"
                        name="update">
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
                    <h5 class="modal-title" id="exampleModalLabel"style="font-color:#1b3d6d;font-family:Montserrat-Bold">Gestionar Permisos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" id="role_permission" name="form">
                        <input type="hidden" name="id" id="id">
                        {{ csrf_field() }}
                        Permisos :
                        <select name="permission" id="" class="form-control">
                            @foreach ($permission as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <p></p>
                        @canany(['administrar', 'agregar'])
                        <input type="button" value="Agregar" class="btn btn-success" onclick="rolePermissionStore()"
                            name="create">@endcanany


                        <div id="mycontent_detail">
                            @if (isset($roles) == null)

                            @else
                                @include('role_permissiontable')
                            @endif

                        </div>



                </div>
                <div class="modal-footer"style="font-family:Montserrat-Bold">
                    <input type="button" value="Nuevo" class="btn" style="font-family:Montserrat-SemiBold;background-color:#023039;color:#ffffff" onclick="New();$('#role')[0].reset();"
                        name="new">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
