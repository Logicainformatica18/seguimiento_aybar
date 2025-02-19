@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="card-title">Blog</h1>
                            {{-- <h1 class="mb-4 mb-md-0 card-title">Blog</h1> --}}
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Blog
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
                        <form action="" method="post" role="form" id="topic"
                            name="form"enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}
                            <h6>Descripción :</h6>
                            <input type="text" name="description" id="description" class="form-control">
                            <h6>Tipo :</h6>
                            <select name="type" id="type"class="form-control">
                                <option value="video">Video</option>
                                <option value="read">Lectura</option>
                            </select>
                            <br>
                            <h6>Portada</h6>
                            <p></p>
                            <div class="col-12">
                                <input class="form-control" type="file" id="imgInp" name="photo"
                                    onchange="readImage(this,'#blah');">

                            </div>
                            <div class="col-12 text-center">
                                <br>
                                <img id="blah" name="fotografia" src="https://placehold.co/500x350" alt="Tu imagen"
                                    class="" width="500px" height="300px">
                                <p></p>
                            </div>

                            <p>



                                <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

                            <div class="col-12" data-select2-id="23">
                                <div class="form-group" data-select2-id="22">
                                    <h6>Categorías :</h6>




                                    <select name="category[]"id="category" class="select2 select2-hidden-accessible"
                                        multiple="" data-placeholder="Any" style="width: 100%;" data-select2-id="1"
                                        tabindex="-1" aria-hidden="true">
                                        {{-- <option data-select2-id="16" value="1" selected >número 0</option>
                                        <option data-select2-id="17" value="1" >número 1</option>
                                        </option> --}}

                                        @foreach ($category as $item)
                                            @if ($loop->first)
                                                <option selected value="{{ $item->id }}">{{ $item->description }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                                            @endif
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            <p></p>

                            </p>
                            <h6>Contenido :</h6>
                            <textarea id="my-textarea"style="height:'900px'" name="post">
                 
                          </textarea>
                            <br>
                            <h6>Detalle : </h6>
                            <input type="text" name="detail" id="detail" class="form-control">
                            <p></p>
                            <input type="button" value="Nuevo" class="btn mb-1 me-1 bg-primary-subtle text-primary"
                                onclick="New();$('#topic')[0].reset();reset_textarea();" name="new">
                            @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn mb-1 me-1 btn-success"
                            id="create" onclick="topicStore()"
                                name="create">@endcanany
                            <input type="button" value="Modificar" class="btn mb-1 me-1 bg-danger-subtle text-danger"id="update"
                                onclick="topicUpdate();" name="update">
                            <p></p>
                        </form>

                        <p>

                        </p>
                        <p class="card-subtitle mb-3">
                           
                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive"id="mycontent">
                            @include('topic.topictable')
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
        <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-success text-white">
                        <h4 class="modal-title text-white" id="success-header-modalLabel">
                            Blog
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="post" role="form" id="topic"
                            name="topic"enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            {{ csrf_field() }}

                            Descripción : <input type="text" name="description" id="description"
                                class="form-control">

                            Detalle : <input type="text" name="detail" id="detail" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Nuevo" class="btn btn-primary"
                            onclick="New();$('#topic')[0].reset();" name="new">
                        @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn bg-success-subtle text-success "
                            onclick="topicStore()" id="create">@endcanany
                        <input type="button" value="Modificar" class="btn bg-danger-subtle text-danger"
                            onclick="topicUpdate();" id="update">
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
@endsection
