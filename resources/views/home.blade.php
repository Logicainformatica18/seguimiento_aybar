@extends('template')

@section('content')


    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <p></p>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-family:Montserrat-Bold;color:#1b3d6d">Roles</h1>
                    {{ session('success') }}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" style="color:#1b3d6d">Roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<p>
    &nbsp;&nbsp;&nbsp;&nbsp;
</p>
    <div class="container">


        <div class="row">
            @foreach ($users->roles as $item)
                
                    @if ($item->name == 'Socio Comercial')
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <a href="{{ url($item->name) }}">
                            <div class="card"
                                style="width: 100%;background: linear-gradient(to left, #011316 20%, #023039 80% );border-radius:20px">
                                <img class="card-img-top" src="{{ asset('Socio Comercial.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"style="color:white ">{{ $item->name }}</h5>
                                    <p class="card-text"style="color:#ffff ">Como Socio Comercial podrás acceder a los materiales del curso donde te haz inscrito.</p>
                                    {{-- <a href="#" class="btn btn-primary">Ingresar</a> --}}
                                </div>
                            </div>
                        </a>
                        <p></p>
                    </div>
            
              
                    @elseif($item->name == 'Coordinación')
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                        <a href="{{ url($item->name) }}">
                            <div class="card"
                                style="width: 100%;background: linear-gradient(to left, #011316 20%, #023039 80% );border-radius:20px">
                                <img class="card-img-top" src="{{ asset('COORDINACION.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"style="color:white ">{{ $item->name }}</h5>
                                    <p class="card-text"style="color:#ffff ">Como coordinador tendrán todos los permisos en el
                                        sistema.</p>
                                    {{-- <a href="#" class="btn btn-primary">Ingresar</a> --}}
                                </div>
                            </div>
                        </a>
                        <p></p>
                                            </div>
                                            
                    @elseif($item->name == 'Coach')
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <a href="{{ url($item->name) }}">
                        <div class="card"
                            style="width: 100%;background: linear-gradient(to left, #011316 20%, #023039 80% );border-radius:20px">
                            <img class="card-img-top" src="{{ asset('COORDINACION.png') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"style="color:white ">{{ $item->name }}</h5>
                                <p class="card-text"style="color:#ffff ">Como Coach podrás gestionar las calificaciones de
                                    tus Socio Comercials</p>
                                {{-- <a href="#" class="btn btn-primary">Ingresar</a> --}}
                            </div>
                        </div>
                    </a>
                    <p></p>
                </div>
                    @endif

               
                <p></p>
            @endforeach
        </div>

    </div>
@endsection
