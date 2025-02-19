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

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

</head>

<style>
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
    <div style="background-color: #03424E; height: 80px;margin-bottom: -10px;"
        class="d-none d-xs-flex d-lg-flex  justify-content-center align-items-center">
        <div class="text-center m-5 " style="letter-spacing: 1px;word-spacing: 5px; ">
            <b style="font-size:x-large;color:white; ">ENCUENTRA TU LOTE SOÑADO AQUÍ &nbsp;</b>
            <a href="#" class="  btn bg-white"
                style="color:#03424E;height: 40px; margin-bottom: 10px;
     border-radius: 100px;width: 300px;
     ">
                <b>MÁS INFORMACIÓN</b>
            </a>
        </div>
    </div>
    <div id="main-wrapper flex-column">
        <header class="header">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container">

                    <a class="position-relative navbar-brand me-0 py-0 m-2 " href="{{ url('/') }}"> <img
                            src="{{ asset('ayba/1.png') }}" alt="img-fluid" width="80px"style="margin-left:0%" />
                    </a>



                    <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-menu-2 fs-9"></i>
                    </button>
                    <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="ti ti-menu-2 fs-9"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center mb-2 mb-lg-0 mx-auto" style="letter-spacing: 1px; ">
                            <li class="nav-item">
                                @php
                                    $color_nav_enable = '#F6A42C';
                                    $color_nav_disable = '#03424E';
                                @endphp

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('/') }}"
                                    style="color: {{ request()->is('/') ? $color_nav_enable : $color_nav_disable }}">
                                    <b style="word-spacing: 9px;">INICIO</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('nosotros') }}"
                                    style="color: {{ request()->is('nosotros') ? $color_nav_enable : $color_nav_disable }}">
                                    <b style="word-spacing: 9px;">NOSOTROS</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('proyectos') }}"
                                    style="color: {{ request()->is('proyectos') ? $color_nav_enable : $color_nav_disable }}">
                                    <b style="word-spacing: 9px;">PROYECTOS</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('blog') }}"
                                    style="color: {{ request()->is('blog') ? $color_nav_enable : $color_nav_disable }}">
                                    <b style="word-spacing: 9px;">BLOG</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('contacto') }}"
                                    style="color: {{ request()->is('contacto') ? $color_nav_enable : $color_nav_disable }}">
                                    <b style=" word-spacing: 9px;">CONTÁCTANOS </b></a>

                            </li>



                            <li class="nav-item ms-2">
                                <a class="btn btn-hover-shadow" href="https://pagos.aybarcorp.com"
                                    style="color:white;border-radius:100px;background-color:#F6A42C;width: 190px;">
                                    <b>PAGA TU LOTE</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>




        @yield('content')

        <div class="container-fluid  py-1" style="background-color: #045463;">
            <div class="container">
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 col-lg-6 col-xl-4 justify-content-center text-center  text-lg-start text-md-start   mt-10">
                        <h3 clas="" style="margin-top:30px;margin-left:0px;color:#F6A42C ">Contáctanos</h3>
                        <!-- <h4 clas="d-lg-none "style="margin-top:30px;margin-left:0px"><span> Contáctanos</span></h4> -->

                        <ul class="text-white mt-4 ">
                            <li><i class=""></i> (+51) 970 579 363 </li>
                            <li>(+51) 977 637 351 </li>
                            <li>Av.Circunvalación Del Golf Los Incas 134 <br>Patio Panorama, Santiago de Surco</li>
                            <li>Jr. Los Viñedos 170, La Molina</li>
                        </ul>
                    </div>
                    <!-- <div class="col-1 d-none d-xl-block"></div> -->

                    <div
                        class="col-sm-12 col-md-7 col-lg-6 col-xl-4 justify-content-center  text-center  text-lg-start text-md-end mt-10">

                        <h3 clas="" style="margin-top:30px;margin-left:0px;color:#F6A42C ">Descubre más</h3>
                        <p></p>
                        <div class="row">
                            <div class="col-6">
                                <ul class="text-white mt-4">
                                    <li>Inicio</li>
                                    <li>Contáctanos</li>
                                    <li>Quiénes somos</li>
                                    <li>Preguntas frecuentes</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="text-white mt-4">
                                    <li>Blog</li>
                                    <li>Proyectos</li>
                                    <li>Términos y condiciones</li>
                                    <li>Libro de reclamaciones</li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <!-- <div class="col-1 d-none  d-xl-block"></div> -->
                    <!-- <div class="col-4 d-none d-sm-block"></div> -->

                    <div class="mt-4 text-center col-xl-4 mt-10">
                        <img src="{{ asset('ayba/4.png') }}" width="40%" alt="" srcset=""><br>
                        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png"
                            width="45px" alt="">
                        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png"
                            width="45px" alt="">
                        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png"
                            width="45px" alt="">
                        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png"
                            width="45px" alt="">
                        <p></p>
                    </div>
                </div>
            </div>



        </div>


        <footer class="footer-part pt-4 pb-3 py-2" style="background-color:#03424E;">

            <div class="container">
                <div class="justify-content-center">

                    <div class="text-center">


                        <p class="mb-0 text-white">
                            <a class="d-none d-sm-none d-sm-block d-md-block d-lg-block  d-xl-block display-1 fs-4 text-white text-hover-primary  border-primary"
                                href="https://anthonycode.com/" target="_blank">
                                Copyright 2025, Aybar Corp&nbsp;&nbsp; | &nbsp;&nbsp; Todos los Derechos reservados
                            </a>
                            <a class="d-sm-none  display-1 fs-2 text-center text-white text-hover-primary  border-primary"
                                href="https://anthonycode.com/" target="_blank">
                                Copyright 2025, Aybar Corp <br> Todos los Derechos reservados
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </footer>
        <div class="offcanvas offcanvas-start matdash-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header p-4">
                <img src="{{ asset('ayba/1.png') }}" alt="matdash-img" class="img-fluid" width="150" />
            </div>
            <div class="offcanvas-body p-4">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuarios <i class="ti ti-chevron-down fs-14"></i>
                        </a>
                        <ul class="dropdown-menu ps-2">
                            <li><a class="dropdown-item text-dark" href="{{url('usuarios')}}">Usuarios</a></li>
                            <li><a class="dropdown-item text-dark" href="#">Roles</a></li>
                     
                        </ul>
                    </li> --}}

                    <li class="nav-item mt-3">
                        <a class="nav-link fs-3 text-dark active" aria-current="page"
                            href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link fs-3 text-dark active" aria-current="page"
                            href="{{ url('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link fs-3 text-dark active" aria-current="page"
                            href="{{ url('proyectos') }}">Proyectos</a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link fs-3 text-dark active" aria-current="page"
                            href="{{ url('blog') }}">Blogs</a>
                    </li>
                    {{-- <li class="nav-item mt-3"><a class="nav-link fs-3 text-dark" href="#">Pages</a></li> --}}
                </ul>
                <a href="{{ url('login') }}" class="btn btn-primary w-100 py-2">Administrar</a>
                <br>
                <a href="{{ url('logout') }}" class="btn btn-secondary w-100 py-2">Salir</a>
                {{-- <form class="d-flex mt-3" role="search">
                    <a href="main/authentication-login2.html" class="btn btn-primary w-100 py-2">Login</a>
                </form> --}}
            </div>
        </div>





        <style>
            /* Estilos para el botón flotante de WhatsApp */
            .whatsapp-container {
                position: fixed;
                bottom: 80px;
                right: 20px;
                display: flex;
                align-items: center;
            }

            .whatsapp-btn {
                background-color: #25d366;
                /* Color de fondo del botón */
                border-radius: 50%;
                /* Hace que el botón tenga forma circular */
                width: 50px;
                height: 50px;
                text-align: center;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5), 0 0 0px rgba(233, 19, 19, 0.3);
                /* Desenfoque negro adicional */
                margin-right: 10px;
                /* Espacio entre el botón y el mensaje */
            }


            .whatsapp-btn a {
                display: block;
                width: 100%;
                height: 100%;
                line-height: 50px;
                color: #fff;
                /* Color del ícono */
                font-size: 30px;
            }

            .whatsapp-message {
                background-color: #023039;
                color: #fff;
                padding: 10px;
                border-radius: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                font-family: Arial, sans-serif;
                font-size: 10px;
                white-space: nowrap;
                /* Evita que el texto se divida en varias líneas */
            }
        </style>



    </div>
    <div class="whatsapp-container">
        <div class="whatsapp-message">
            ¿Necesitas ayuda?
        </div>
        <div class="whatsapp-btn">
            <a href="https://wa.me/970579363" target="_blank" title="Enviar mensaje por WhatsApp">

                <i class="ti ti-brand-whatsapp"></i>
            </a>
        </div>

    </div>



    <div class="d-none d-md-block">
        <div class="social-container   p-2 pt-3 pb-3"
            style="background-color: #F6A42C;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">

            <a href="https://www.facebook.com/aybarcorpoficial" target="_blank" class="social-button">
                <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/aybarcorpoficial" target="_blank" class="social-button">
                <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png" alt="Instagram">
            </a>
            <a href="https://www.linkedin.com/company/aybarcorpoficial" target="_blank" class="social-button">
                <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-0.png" alt="LinkedIn">
            </a>

        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/js/landingpage/landingpage.js') }}"></script>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@justinribeiro/lite-youtube@1/lite-youtube.min.js"></script>
</body>

</html>
