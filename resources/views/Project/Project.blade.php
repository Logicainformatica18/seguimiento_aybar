@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h1 class="text-primary">Gestión de Proyectos</h1>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="../main/index.html">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Proyectos
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datatables">
                <div class="card">
                    <div class="card-body">
                        <p class="card-subtitle mb-3">
                            <button type="button" class="btn mb-1 me-1 btn-success" data-bs-toggle="modal"
                                data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                onclick="New();$('#Project')[0].reset();Project.fotografia.src ='https://placehold.co/150';">
                                Agregar
                            </button>
                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div>
                        <div class="table-responsive" id="mycontent">
                            @include('Project.Projecttable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Crear/Editar Proyectos -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" aria-labelledby="success-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success text-white">
                    <h4 class="modal-title text-white" id="success-header-modalLabel">Proyectos</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form" id="Project" name="Project"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        {{ csrf_field() }}

                        <!-- Información Principal -->
                        <div class="mb-3">
                            <h3>Información General</h3>
                            <label>Título:</label>
                            <input type="text" name="title" id="title" class="form-control">
                            <label>Descripción:</label>
                            <input type="text" name="description" id="description" class="form-control">
                            <label>Locación:</label>
                            <input type="text" name="location" id="location" class="form-control">
                            <label>Terrenos:</label>
                            <input type="text" name="land" id="land" class="form-control">
                            <label>Terrenos Capacidad:</label>
                            <input type="text" name="land_count" id="land_count" class="form-control">
                            <label>País:</label>
                            <select name="country" id="country" class="form-control">
                                <option value="lima">Lima</option>
                                <option value="ica">Ica</option>
                                <option value="huacho">Huacho</option>
                                <option value="huaral">Huaral</option>
                                
                            </select>
                            <label>URL:</label>
                            <input type="text" name="detail" id="detail" class="form-control">
                        </div>

                        <!-- Acordeón -->
                        <div class="accordion" id="projectAccordion">
                            <!-- Imágenes -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingImages">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseImages" aria-expanded="true"
                                        aria-controls="collapseImages">
                                        Imágenes
                                    </button>
                                </h2>
                                <div id="collapseImages" class="accordion-collapse collapse show"
                                    aria-labelledby="headingImages" data-bs-parent="#projectAccordion">
                                    <div class="accordion-body">
                                        <label>Imagen Principal:</label>
                                        <input type="file" name="image_1" id="image_1" class="form-control"
                                            onchange="readImage(this, '#previewImage');">
                                        <img id="previewImage"name="foto" src="https://placehold.co/150" alt="Tu imagen"
                                            class="img-bordered mt-2" width="100%">

                                        <h6 class="mt-4">Mapas:</h6>
                                        <div class="row">
                                            @for ($i = 1; $i <= 2; $i++)
                                                <div class="col-md-4 mb-3">
                                                    <label>Mapa {{ $i }}:</label>
                                                    <input type="file" name="map_{{ $i }}"
                                                        id="map_{{ $i }}" class="form-control"
                                                        onchange="readImage(this, '#mapPreview_{{ $i }}');">
                                                    <img id="mapPreview_{{ $i }}"name="mapPreview_{{ $i }}"
                                                        src="https://placehold.co/150"
                                                        alt="Previsualización Mapa {{ $i }}"
                                                        class="img-bordered mt-2" width="100%">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fotos -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingPhotos">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePhotos" aria-expanded="false"
                                        aria-controls="collapsePhotos">
                                        Galería de Fotos
                                    </button>
                                </h2>
                                <div id="collapsePhotos" class="accordion-collapse collapse"
                                    aria-labelledby="headingPhotos" data-bs-parent="#projectAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            @for ($i = 1; $i <= 20; $i++)
                                                <div class="col-md-4 mb-3">
                                                    <label>Foto {{ $i }}:</label>
                                                    <input type="file" name="photo_{{ $i }}"
                                                        id="photo_{{ $i }}" class="form-control"
                                                        onchange="readImage(this, '#photoPreview_{{ $i }}');">
                                                    <img id="photoPreview_{{ $i }}"
                                                        src="https://placehold.co/150"
                                                        alt="Previsualización Foto {{ $i }}"
                                                        class="img-bordered mt-2" width="100%">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Videos -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingVideos">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseVideos" aria-expanded="false"
                                        aria-controls="collapseVideos">
                                        Videos
                                    </button>
                                </h2>
                                <div id="collapseVideos" class="accordion-collapse collapse"
                                    aria-labelledby="headingVideos" data-bs-parent="#projectAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            @for ($i = 1; $i <= 10; $i++)
                                                <div class="col-md-6 mb-2">
                                                    <label>Video {{ $i }}:</label>
                                                    <input type="url" name="video_{{ $i }}"
                                                        id="video_{{ $i }}" class="form-control"
                                                        placeholder="URL del video">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Subproyectos -->

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSubprojects">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSubprojects" aria-expanded="false"
                                        aria-controls="collapseSubprojects">
                                        Subproyectos
                                    </button>
                                </h2>
                                <div id="collapseSubprojects" class="accordion-collapse collapse"
                                    aria-labelledby="headingSubprojects" data-bs-parent="#projectAccordion">
                                    <div class="accordion-body">
                                        <div class="row">
                                            @for ($i = 1; $i <= 20; $i++)
                                                <div class="col-md-6 mb-2">
                                                    <label>Subproyecto {{ $i }}:</label>
                                                    <input type="text" name="subproject_{{ $i }}"
                                                        id="subproject_{{ $i }}" class="form-control">
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <label>Imagen {{ $i }}:</label>
                                                    <input type="file" name="subproject_image_{{ $i }}"
                                                        id="subproject_image_{{ $i }}" class="form-control"
                                                        onchange="readImage(this, '#subProjectImagePreview_{{ $i }}');">
                                                    <img id="subProjectImagePreview_{{ $i }}"
                                                        src="https://placehold.co/150"
                                                        alt="Previsualización Imagen Sub Proyecto {{ $i }}"
                                                        class="img-bordered mt-2" width="100%">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>




                                <!-- Turismo -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTourism">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTourism"
                                            aria-expanded="false" aria-controls="collapseTourism">
                                            Turismo
                                        </button>
                                    </h2>
                                    <div id="collapseTourism" class="accordion-collapse collapse"
                                        aria-labelledby="headingTourism" data-bs-parent="#projectAccordion">
                                        <div class="accordion-body">
                                            <div class="row">
                                                @for ($i = 1; $i <= 6; $i++)
                                                    <div class="col-md-6 mb-2">
                                                        <label>Atractivo Turístico {{ $i }}:</label>
                                                        <input type="text" name="tourist_{{ $i }}"
                                                            id="tourist_{{ $i }}" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label>Imagen {{ $i }}:</label>
                                                        <input type="file" name="tourist_image_{{ $i }}"
                                                            id="tourist_image_{{ $i }}" class="form-control"
                                                            onchange="readImage(this, '#touristImagePreview_{{ $i }}');">
                                                        <img id="touristImagePreview_{{ $i }}"
                                                            src="https://placehold.co/150"
                                                            alt="Previsualización Imagen Turística {{ $i }}"
                                                            class="img-bordered mt-2" width="100%">
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    @canany(['administrar', 'agregar'])
                        <input type="button" value="Guardar" class="btn bg-success-subtle text-success"
                            onclick="ProjectStore()" id="create">
                    @endcanany
                    <input type="button" value="Modificar" class="btn bg-danger-subtle text-danger"
                        onclick="ProjectUpdate();" id="update">
                </div>
            </div>
        </div>
    </div>
@endsection
