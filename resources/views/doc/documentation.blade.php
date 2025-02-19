@extends('template')
@section('content')
   
       

            <div class="body-wrapper">
            
                    {{-- <div class="card card-body py-3">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="d-sm-flex align-items-center justify-space-between">
                                    <h1 class="text-primary">Videos</h1>
                                    <nav aria-label="breadcrumb" class="ms-auto">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item d-flex align-items-center">
                                                <a class="text-muted text-decoration-none d-flex"
                                                    href="../">
                                                    <iconify-icon icon="solar:home-2-line-duotone"
                                                        class="fs-6"></iconify-icon>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">
                                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                                    Documentación
                                                </span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="">
                        <div class="">
                            <div class="card-body p-4">
                                <div class="wizard-content">
                                    <form action="#" class="tab-wizard wizard-circle">
                                        <!-- Step 1 -->
                                        <h6>Editar enlaces</h6>
                                        <section>
                                            <div class="table-responsive text-center">
                                                <h3 class="text-primary">Editar enlaces</h3>
                                                <iframe
                                                style="border-radius: 10px"
                                                src="https://drive.google.com/file/d/1IwNFgpF8hai0bk8LWpYtYeqeagLJ4qhb/preview" 
                                                width="1000px" height="600px" allow="autoplay"></iframe>
                                        
                                            </div>
                                          
                                        </section>
                                     
                                        <h6>Subida de imágenes</h6>
                                        <section>
                                            <div class="table-responsive text-center">
                                                <h3 class="text-primary">Subida de imágenes</h3>
                                                <iframe
                                                style="border-radius: 10px"
                                                src="https://drive.google.com/file/d/1pzfiPWR6o_9JOzoHQ27UugLVFYAlK6WM/preview" 
                                                width="1000px" height="600px" allow="autoplay"></iframe>
                                        
                                            </div>
                                          
                                        </section>
                                        <h6>Cambiar Imágenes</h6>
                                        <section>
                                            <div class="table-responsive text-center">
                                                <h3 class="text-primary">Cambiar Imágenes</h3>
                                                <iframe
                                                style="border-radius: 10px"
                                                src="https://drive.google.com/file/d/1LsgxqkSKREdoK5QHaM5c8mfOdrFpRISM/preview" 
                                                width="1000px" height="600px" allow="autoplay"></iframe>
                                        
                                            </div>
                                          
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
      
            </div>
    

           



    <script src="../assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="../assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../assets/js/forms/form-wizard.js"></script>
    <script src="../assets/js/apps/ecommerce.js"></script>
@endsection
