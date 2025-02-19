<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/jpg" href="{{ asset('ayba/favicon.png') }}" />
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <title>AybarCorp</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/aos/dist/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/template.css') }}" />


    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> --}}
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">

    <script src="{{ asset('js/section.js') }}"></script>
    <script src="{{ asset('js/customer.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/css/intlTelInput.css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/intlTelInput.min.js"></script>
</head>

<style>
    
    .bg-responsive {
    background-image: url('../resource/1738080045_portada-inicio-1-escritorio.jpg');
    background-repeat: no-repeat;
    width: 100%;

    /* height: 85vh; */
}

/* Para pantallas medianas (tablets) */
@media (max-width: 1292px) {
    .bg-responsive {
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url('../resource/1738247474_679b8d32253e5portada-inicio-1-tablet.jpg');
    }
}

/* Para pantallas pequeñas (móviles) */
@media (max-width: 418px) {
    .bg-responsive {
        width: 100%;
        height: 70vh;
        background-position: center;
        background-repeat: no-repeat;
        /* background-size: contain; */
        background-image: url('../resource/1738247025_679b8b712800cportada-inicio-1-celular.jpg');
    }
}
   
    body {
        font-family: 'Montserrat', sans-serif;
        /* Aplica Montserrat como fuente principal */
        font-size: 16px;
        /* Tamaño base del texto */

        line-height: 1.6;
        /* Altura de línea para mejor legibilidad */
    }
</style>

<body>

    <!-- Preloader -->
    <div class="preloader"><img src="{{ asset('ayba/1.png') }}" alt="loader" class="lds-ripple img-fluid" /></div>
    <div class="progress" >
        <div class="progress-bar text-bg-danger"id="progress_bar" style="width: 0%; height: 6px" role="progressbar">
        </div>
        
    </div>




    <div id="mycontent">

    </div>


    <div id="main-wrapper flex-column">

        <form method="post" id="Customer">
            @csrf

            @php
                $i = 0;
                $module= array("module","/plantilla","/inicio","/nosotros","/proyectos","/blog","/contacto");
            @endphp
            @foreach ($section as $sections)
                @php
                    $i = $i + 1;
                    echo $sections->code;
                @endphp
        </form>
        <div class="container-fluid mt-5 bg-white">


            <h1 style="color:#03424E">{{ $sections->description }}
                @canany(['administrar', 'agregar'])
                    <input type="button" value="Guardar vista Previa" class="btn mb-1 me-1 bg-success text-white" id="create"
                        onclick="sectionUpdateDinamic('{{ $i }}')" name="create">
                @endcanany
                <a  class="btn mb-1 me-1 bg-warning text-white"
                href="../home_demo{{$module[$sections->module]}}" target="_blank">Vista Previa</a>
                @canany(['administrar', 'actualizar'])
                    <a  class="btn mb-1 me-1 bg-danger text-white"
                   onclick="sectionGenerate('{{$sections->module}}');return false"  href="#">Guardar en Producción</a>
                @endcanany

            </h1>
            <form action=""name="section{{ $i }}" id="section{{ $i }}">
                <span>Nivel : </span>



                <select name="nivel" id="nivel{{ $i }}" class="form-control">
                    @for ($nivel = 1; $nivel <= 20; $nivel++)
                        <option value="{{ $nivel }}" {{ $nivel == $sections->nivel ? 'selected' : '' }}>
                            {{ $nivel }}
                        </option>
                    @endfor
                </select>

                <br>
                <input type="hidden" name="id"value="{{ $sections->id }}">
                <!-- Textarea para el editor -->
                <div class="form-group">
                    <textarea name="code" id="my-textarea" class="my-textarea form-control" rows="10">
                          @php
                              echo $sections->code;
                          @endphp
                        </textarea>
                </div>
            </form>
        </div>
        @endforeach







        @yield('content');



    </div>

    <!-- FOOTER FLOTANTE-->
    <style>
        #fixed-footer {
          position: fixed;
          bottom: 0;
          width: 100%;
          z-index: 1050; /* Para asegurarte que esté encima */
          background-color: #092126; /* Color del fondo del footer */
          border-top: 1px solid #ddd;
          box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }
        .close-footer {
          position: absolute;
          top: 5px;
          right: 10px;
          cursor: pointer;
        }
      </style>

    <div id="fixed-footer" class="text-center py-3">
        <span class="close-footer">&times;</span>
        <div class="row">
            <div class="col-2">
                <a class="nav-link" aria-current="page" href="plantilla" style="color: #ffffff">
                    <b style="word-spacing: 1px;"class="fs-2">PLANTILLA</b>
                </a>
            </div>
            <div class="col-2">
                <a class="nav-link" aria-current="page" href="inicio" style="color: #ffffff">
                    <b style="word-spacing: 1px;"class="fs-2">INICIO</b>
                </a>
            </div>
            <div class="col-2">
                <a class="nav-link" aria-current="page" href="nosotros" style="color: #ffffff">
                    <b style="word-spacing: 1px;"class="fs-2">NOSOTROS</b>
                </a>
            </div>
            <div class="col-2">
                <a class="nav-link" aria-current="page" style="color: #ffffff" href="proyectos">
                    <b style="word-spacing: 1px;"class="fs-2">PROYECTOS</b>
                    </a>
            </div>
            <div class="col-2">
                <a class="nav-link" aria-current="page" href="blog" style="color: #ffffff">
                    <b style="word-spacing: 1px;"class="fs-2">BLOG</b>
                </a>
            </div>
     
            <div class="col-2">
                <a class="nav-link" aria-current="page" href="contacto" style="color: #ffffff">
                    <b style="word-spacing: 1px;"class="fs-2">CONTÁCTANOS</b>
                </a>
    
            </div>
          
    
   
           
   
           
       
          
       
              
                  
                    
              
         
                

           
      
        </div>
      </div>
      <script>
        // Función para ocultar el footer al hacer clic en la X
        document.querySelector('.close-footer').addEventListener('click', function () {
          document.getElementById('fixed-footer').style.display = 'none';
        });
      </script>

 <!-- FOOTER FLOTANTE-->



    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/js/landingpage/landingpage.js') }}"></script>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1/lite-youtube.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar el editor Summernote extendido
            $('.my-textarea').summernote({
                height: 400, // Altura del editor
                placeholder: 'Escribe algo aquí...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                        'subscript', 'clear'
                    ]],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['history', ['undo', 'redo']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact',
                    'Tahoma', 'Times New Roman', 'Verdana', 'Manrope', 'Montserrat', 'Montserrat-Bold',
                    'Montserrat-SemiBold', 'Montserrat-Regular'
                ], // Agrega Montserrat aquí
                fontNamesIgnoreCheck: ['Montserrat', 'Montserrat-Regular', 'Montserrat-Bold',
                    'Montserrat-SemiBold'
                ] // Ignora el chequeo para la fuente personalizada


            });
        });
    </script>
    <script>
        const input = document.querySelector("#phone");

        // Inicialización de intl-tel-input con Perú como valor predeterminado
        window.intlTelInput(input, {
            initialCountry: "pe", // Código de país ISO 3166-1 Alpha-2 para Perú
            separateDialCode: true, // Muestra el código de país separado
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/utils.js" // Para validaciones
        });
    </script>

</body>

</html>
