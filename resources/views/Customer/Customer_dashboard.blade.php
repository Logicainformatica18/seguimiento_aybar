@extends('template')
@section('content')
    <div class="body-wrapper">
        <div class="">

            <div class="card card-body py-3">

                <h3 class="text-primary">Dashboard</h3>
                <div class="row flex-nowrap">
                    @php
                        $colors_gradient = [
                            'success-gradient',
                            'primary-gradient',
                            'info-gradient',
                            'warning-gradient',
                            'danger-gradient',
                            'secondary-gradient',
                            'dark-gradient',
                        ];

                        $colors = ['success', 'primary', 'info', 'warning', 'danger', 'secondary', 'dark'];
                        $icons = [
                            'solar:users-group-rounded-linear',
                            'solar:siderbar-linear',
                            'solar:library-linear',
                            'solar:card-2-linear',
                            'solar:notification-lines-remove-linear',
                            'solar:checklist-minimalistic-linear',
                            'solar:card-transfer-linear',
                        ];

                    @endphp

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Cantidad de clientes por proyecto
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">



                                    <div class="row">
                                        @foreach ($count->project_customer_count as $index => $project)
                                            @php
                                                $color = $colors[$index % count($colors)]; // Para recorrer la lista de colores
                                                $color_gradient = $colors_gradient[$index % count($colors_gradient)]; // Para recorrer la lista de colores
                                                $icon = $icons[$index % count($icons)]; // Para asignar íconos dinámicamente
                                            @endphp
                                            <div class="col-md-2 mb-3">
                                                <div class="card {{ $color_gradient }} text-white">
                                                    <div class="card-body text-center px-9 pb-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-center round-48 rounded text-bg-{{ $color }} flex-shrink-0 mb-3 mx-auto">
                                                            <iconify-icon icon="{{ $icon }}"
                                                                class="fs-10 text-white"></iconify-icon>
                                                        </div>
                                                        <span
                                                            class="fw-normal fs-3 mb-1 text-black">{{ $project->description }}</span>
                                                        <h4
                                                            class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                            {{ $project->count }}
                                                        </h4>
                                                        <a target="_blank" href="{{ url('clientes/' . $project->id) }}"
                                                            class="btn btn-{{ $color }}"
                                                            style="border: solid 1px white; width:100%">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <br>
                <div class="row flex-nowrap">
                    @php
                        $colors_gradient = [
                            'success-gradient',
                            'primary-gradient',
                            'info-gradient',
                            'warning-gradient',
                            'danger-gradient',
                            'secondary-gradient',
                            'dark-gradient',
                        ];

                        $colors = ['success', 'primary', 'info', 'warning', 'danger', 'secondary', 'dark'];
                        $icons = [
                            'solar:users-group-rounded-linear',
                            'solar:siderbar-linear',
                            'solar:library-linear',
                            'solar:card-2-linear',
                            'solar:notification-lines-remove-linear',
                            'solar:checklist-minimalistic-linear',
                            'solar:card-transfer-linear',
                        ];

                    @endphp

                    <div class="accordion" id="accordionExample_2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne_2" aria-expanded="true" aria-controls="collapseOne_2">
                                    Cantidad de Proyectos de cada editor
                                </button>
                            </h2>
                            <div id="collapseOne_2" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample_2">
                                <div class="accordion-body">



                                    <div class="row">
                                        @foreach ($count->project_editor_count as $index => $project)
                                            @php
                                                $color = $colors[$index % count($colors)]; // Para recorrer la lista de colores
                                                $color_gradient = $colors_gradient[$index % count($colors_gradient)]; // Para recorrer la lista de colores
                                                $icon = $icons[$index % count($icons)]; // Para asignar íconos dinámicamente
                                            @endphp
                                            <div class="col-md-2 mb-3">
                                                <div class="card {{ $color_gradient }} text-white">
                                                    <div class="card-body text-center px-9 pb-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-center round-48 rounded text-bg-{{ $color }} flex-shrink-0 mb-3 mx-auto">
                                                            <iconify-icon icon="{{ $icon }}"
                                                                class="fs-10 text-white"></iconify-icon>
                                                        </div>
                                                        <span
                                                            class="fw-normal fs-3 mb-1 text-black">{{ $project->description }}</span>
                                                        <h4
                                                            class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                            {{ $project->count }}
                                                        </h4>
                                                        <a target="_blank" href="{{ url('clientes/' . $project->id) }}"
                                                            class="btn btn-{{ $color }}"
                                                            style="border: solid 1px white; width:100%">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <br>
                <div class="row flex-nowrap">
                    @php
                        $colors_gradient = [
                            'success-gradient',
                            'primary-gradient',
                            'info-gradient',
                            'warning-gradient',
                            'danger-gradient',
                            'secondary-gradient',
                            'dark-gradient',
                        ];

                        $colors = ['success', 'primary', 'info', 'warning', 'danger', 'secondary', 'dark'];
                        $icons = [
                            'solar:users-group-rounded-linear',
                            'solar:siderbar-linear',
                            'solar:library-linear',
                            'solar:card-2-linear',
                            'solar:notification-lines-remove-linear',
                            'solar:checklist-minimalistic-linear',
                            'solar:card-transfer-linear',
                        ];

                    @endphp

                    <div class="accordion" id="accordionExample_3">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne_3" aria-expanded="true" aria-controls="collapseOne_3">
                                    Cantidad de Proyectos de cada Socio Comercial
                                </button>
                            </h2>
                            <div id="collapseOne_3" class="accordion-collapse collapse " aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample_3">
                                <div class="accordion-body">



                                    <div class="row">
                                        @foreach ($count->project_business_count as $index => $project)
                                            @php
                                                $color = $colors[$index % count($colors)]; // Para recorrer la lista de colores
                                                $color_gradient = $colors_gradient[$index % count($colors_gradient)]; // Para recorrer la lista de colores
                                                $icon = $icons[$index % count($icons)]; // Para asignar íconos dinámicamente
                                            @endphp
                                            <div class="col-md-2 mb-3">
                                                <div class="card {{ $color_gradient }} text-white">
                                                    <div class="card-body text-center px-9 pb-4">
                                                        <div
                                                            class="d-flex align-items-center justify-content-center round-48 rounded text-bg-{{ $color }} flex-shrink-0 mb-3 mx-auto">
                                                            <iconify-icon icon="{{ $icon }}"
                                                                class="fs-10 text-white"></iconify-icon>
                                                        </div>
                                                        <span
                                                            class="fw-normal fs-3 mb-1 text-black">{{ $project->description }}</span>
                                                        <h4
                                                            class="mb-3 d-flex align-items-center justify-content-center gap-1 text-black">
                                                            {{ $project->count }}
                                                        </h4>
                                                        <a target="_blank" href="{{ url('clientes/' . $project->id) }}"
                                                            class="btn btn-{{ $color }}"
                                                            style="border: solid 1px white; width:100%">Ver</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Cantidad de Clientes por cada Proyecto</h5>
                        <div id="barChart"></div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var options = {
                            chart: {
                                type: 'bar',
                                height: 1000,
                                toolbar: {
                                    show: true, // Activa la barra de herramientas
                                    tools: {
                                        download: true, // Permite descargar la imagen del gráfico
                                        selection: true, // Permite seleccionar áreas del gráfico
                                        zoom: true, // Habilita zoom
                                        zoomin: true, // Zoom in
                                        zoomout: true, // Zoom out
                                        pan: true, // Permite arrastrar el gráfico
                                        reset: true, // Botón para resetear el gráfico
                                    }
                                }
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: true // Convierte en barras horizontales
                                }
                            },
                            series: [{
                                name: 'Cantidad de Clientes',
                                data: {!! json_encode($count->project_customer_count->pluck('count')->toArray()) !!}
                            }],
                            xaxis: {
                                categories: {!! json_encode($count->project_customer_count->pluck('description')->toArray()) !!}
                            },
                            colors: ['#008FFB'],
                            dataLabels: {
                                enabled: true
                            },
                            title: {
                                text: 'Cantidad de Clientes por cada Proyecto',
                                align: 'center'
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#barChart"), options);
                        chart.render();
                    });
                </script>




            </div>

            <div class="datatables">

                <!-- start File export -->
                <div class="card">
                    <div class="card-body">

                        {{-- <p class="card-subtitle mb-3">
                            <!-- success header modal -->
                            @canany(['administrar', 'agregar'])
                                <button type="button" class="btn mb-1 me-1 btn-success" data-bs-toggle="modal"
                                    data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                    onclick="New();$('#Customer')[0].reset();">
                                    Agregar
                                </button>
                            @endcanany

                        </p>
                        <div class="mb-2">
                            <h4 class="card-title mb-0">Exportar</h4>
                        </div> --}}
                        {{-- <div class="table-responsive"id="mycontent">



                            @include('Customer.Customertable')

                        </div> --}}

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
    </div>
@endsection
