@extends('template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <p></p><div class="container-fluid">
            <div class="row mb-2">
                <div class="col col-sm-12 col-md-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color:#1b3d6d">Cursos</li>
                    </ol>
                </div>

            </div>
            <div class="row mb-2">
                <div class="col col-lg-2 col-md-4 col-sm-12">
              
                    <h1 style="font-family:Montserrat-Bold;color:#1b3d6d">Cursos</h1>
                    {{ session('success') }}
                </div>
                <div class="col col-lg-10 col-md-8 col-sm-12">
                    <button type="button"style="border-radius:20px;background-color:#023039;color:white;width:150px"
                        class="btn" data-toggle="modal" data-target="#exampleModal"
                        onclick="New();$('#course')[0].reset();">
                        <span style="font-family: Montserrat-Bold;font-size:15px">+</span> Agregar
                    </button>

                </div>
            </div>

            


        </div><!-- /.container-fluid -->
    </section>
    

    
    <!-- /.content -->
    {{-- {{ $course->onEachSide(5)->links() }} --}}
    <div id="mycontent">
        @include('coursetable')
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
                    <form action="" method="post" role="form" id="course" name="form">
                        <input type="hidden" name="id" id="id">
                        {{ csrf_field() }}
                        Descripción : <input type="text" name="description" id="description" class="form-control">


                        Tipo :
                        <select name="type" id="type" class="form-control">
                            @foreach ($type as $item)
                                <option value="{{ $item->id }}">{{ $item->description }}</option>
                            @endforeach
                        </select>
                         Horas : <input type="text" name="hours" id="hours" class="form-control">
                        Detalle : <input type="text" name="detail" id="detail" class="form-control">
                        Nombre de Carpeta de Certificados : <input type="text" name="folder_certification"
                            id="folder_certification" class="form-control">
                            <p></p>
                            Adjuntar brochure
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="brochure" class="form-control"
                                    accept=".pdf" >
                                <label class="custom-file-label" for="customFile">Adjuntar PDF .pdf</label>
                            </div>
                        <div class="container align-content-center">
                            <div class="form-group row">
                                Imagen Presentación
                      
                                <div class="btn btn-default btn-file col-12">
                                    <i class="fas fa-paperclip"></i> Subir
                                    <input type='file' id="imgInp" name="presentation" onchange="readImage(this,'#blah');">
                                </div>


                            </div>
                            <div class="size-100">
                                <br>
                                <img id="blah" name="fotografia" src="https://placehold.co/150" alt="Tu imagen"
                                    class="img-bordered" width="100%">
                            </div>
                        </div>
                         Review : <textarea name="review" id="" cols="30" rows="10" class="form-control"></textarea>
                        <br>
                     



                        <div class="container align-content-center">
                            <div class="form-group row">
                                Curso en Emisión
                                
                                <div class="btn btn-default btn-file col-12">
                                    <i class="fas fa-paperclip"></i> Subir
                                    <input type='file' id="imgInp2" name="emision" onchange="readImage(this,'#blah2');">
                                </div>


                            </div>

                           

                            <div class="size-100">
                                <br>
                                <img id="blah2" name="fotografia2" src="https://placehold.co/150" alt="Tu imagen"
                                    class="img-bordered" width="100%">
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer"style="font-family:Montserrat-Bold">
                    <input type="button" value="Nuevo" class="btn" style="font-family:Montserrat-SemiBold;background-color:#023039;color:#ffffff" onclick="New();$('#course')[0].reset();"
                        name="new">
                    @canany(['administrar', 'agregar'])<input type="button" value="Guardar" class="btn btn-success"id="create" onclick="courseStore()"
                        name="create">@endcanany
                    <input type="button" value="Modificar" class="btn btn-danger"id="update" onclick="courseUpdate();"
                        name="update">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
