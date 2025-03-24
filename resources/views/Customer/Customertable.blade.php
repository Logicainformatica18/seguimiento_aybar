<div class="table-responsive-xl">
    <table id="file_export" class="text-center table table-hover table-bordered table-striped table-responsive">
        <thead>
            <!-- start row -->
            <tr>


                <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                        srcset=""></th>
                        <th>ID</th> <!-- sin grupo -->
                        <th class="comercial">Proyecto</th>
                        <th class="comercial">Mz -LT</th>
                        <th class="comercial">Cliente_1</th>
                        <th class="comercial">Dni_1</th>
                        <th class="comercial">Socio comercial</th>
                        <th class="comercial">Importe de Venta</th>
                        <th class="comercial">Pre Acuerdo</th>
                        <th class="comercial">Inicial Pagado</th>
                        <th class="comercial">Fecha De Inicial</th>
                        <th class="comercial">Monto De Inicial</th>

                        <th class="d-none">Estado</th>

                        <th class="d-none redaccion">Ingreso a Operaciones</th>
                        {{-- <th class="comercial">Cliente_2</th>
                        <th class="comercial">Dni_2</th>
                        <th class="comercial">Cliente_3</th>
                        <th class="comercial">Dni_3</th>
                        <th class="comercial">Cliente_4</th>
                        <th class="comercial">Dni_4</th>
                        <th class="comercial">Cliente_5</th>
                        <th class="comercial">Dni_5</th> --}}
                        {{-- <th class="comercial">Separación</th> --}}


                        {{--
                        <th class="d-none no_group">Precio de Lista de Inventario</th> <!-- sin grupo -->
                        <th class="d-none no_group">Descuento %</th> <!-- sin grupo -->


                        <th class="d-none redaccion">Dias_1</th>
                        <th class="d-none redaccion">Redactado Por</th>
                        <th class="d-none redaccion">Fecha Redactado</th>
                        <th class="d-none no_group">Recogido no devuelto</th> <!-- sin grupo -->
                        <th class="d-none redaccion">Dias_2</th>
                        <th class="d-none no_group">Fecha Contrato Firmado Devueldo</th> <!-- sin grupo -->
                        <th class="d-none no_group">Adenda Refinanciamiento</th> <!-- sin grupo -->
                        <th class="d-none no_group">j2</th> <!-- sin grupo -->
                        <th class="d-none no_group">Enviado a archivo</th> <!-- sin grupo -->
                        <th class="d-none no_group">Virtual</th> <!-- sin grupo -->
                        <th class="d-none no_group">Notaria</th> <!-- sin grupo -->
                        <th class="d-none no_group">Chincha</th> <!-- sin grupo -->
                        <th class="d-none no_group">Post Venta</th> <!-- sin grupo -->
                        <th class="d-none no_group">Proceso de desistimiento</th> <!-- sin grupo -->
                        <th class="d-none no_group">Proceso de Resolución</th> <!-- sin grupo -->
                        <th class="d-none no_group">Cambio de Titular</th> <!-- sin grupo -->
                        <th class="d-none desistimiento">Desistimiento</th>
                        <th class="d-none comision">Comisiones</th>
                        <th class="d-none no_group">Cantidad de Letras</th> <!-- sin grupo -->
                        <th class="d-none no_group">Letras Verificadas</th> <!-- sin grupo --> --}}
                        {{-- <th class="comercial">Aux</th> --}}







                    </tr>
                    <!-- end row -->
                </thead>
        <tbody>
            @foreach ($Customer as $Customers)
                <tr>

                  <td>
                    <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                            <li>
                                <a href="javascript:void(0)" onclick="toggleEstado(this)" class="dropdown-item d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-plus"></i> Estado
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="toggleRedaccion(this)" class="dropdown-item d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-plus"></i> Redacción
                                </a>
                            </li>


                            @canany(['administrar', 'editar'])
                                <li>
                                    <a onclick="CustomerEdit('{{ $Customers->id }}'); Up();  return false" data-bs-toggle="modal"
                                        data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                    onclick="CustomerDestroy('{{ $Customers->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>

                </td>



                <td class="comercial">EX-{{ $Customers->id }}</td>
                <td class="comercial">{{ $Customers->Project->description }}</td>
                <td class="comercial">{{ $Customers->lote }}</td>
                <td class="comercial">{{ $Customers->cliente_1 }}</td>
                <td class="comercial">{{ $Customers->dni }}</td>
                <td class="comercial">{{ $Customers->Business_partner->description }}</td>
                <td class="comercial">{{ number_format($Customers->importe_de_venta,2,'.',',') }}</td> <!-- sin grupo -->
                <td class="comercial">{{ $Customers->pre_acuerdo }}</td><!-- crear -->
                <td class="comercial">{{ $Customers->inicial_pagada }}</td><!-- crear -->
                <td class="comercial">{{ $Customers->fecha_de_inicial }}</td><!-- crear -->
                <td class="comercial">{{ $Customers->monto_de_inicial }}</td><!-- crear -->

                <td class="d-none estado">{{ $Customers->Status->description }}</td>

                <td class="d-none redaccion">{{ $Customers->Editor->description }}</td>
                <td class="d-none redaccion">{{ $Customers->ingreso_a_operaciones }}</td>
                <td class="d-none redaccion">{{ $Customers->REDACTADO }}</td>
                <td class="d-none redaccion">{{ $Customers->dias_1 }}</td>
                {{-- <td class="d-none redaccion">{{ $Customers->dias_2 }}</td> --}}





                {{-- <td class="comercial">{{ $Customers->cliente_2 }}</td>
                <td class="comercial">{{ $Customers->dni_2 }}</td>
                <td class="comercial">{{ $Customers->cliente_3 }}</td>
                <td class="comercial">{{ $Customers->dni_3 }}</td>
                <td class="comercial">{{ $Customers->cliente_4 }}</td>
                <td class="comercial">{{ $Customers->dni_4 }}</td>
                <td class="comercial">{{ $Customers->cliente_5 }}</td>
                <td class="comercial">{{ $Customers->dni_51 }}</td>--}}
                 {{--
                <td class="comercial">{{ substr($Customers->fecha_de_separacion,0,10) }}</td>


                <td class="d-none no_group">{{ $Customers->precio_de_lista_inventario }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->descuento_porcentaje }}</td> <!-- sin grupo -->


                <td class="d-none no_group">{{ $Customers->recogido_no_devuelto }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->fecha_contrato_firmado_devuelto }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->adenda_refinanciamiento }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->j2 }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->enviado_a_archivo }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->virtual }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->notaria }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->chincha }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->post_venta }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->proceso_de_desistimiento }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->proceso_de_resolucion }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->cambio_de_titular }}</td> <!-- sin grupo -->
                <td class="desistimiento">{{ $Customers->desistimiento }}</td>
                <td class="comision">{{ $Customers->comisiones }}</td>
                <td class="d-none no_group">{{ $Customers->cantidad_de_letras }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->letras_verificadas }}</td> <!-- sin grupo --> --}}
                {{-- <td class="no_group">{{ $Customers->aux }}</td> --}}








                </tr>
            @endforeach
        </tbody>

    </table>
    </div>

    <style>
        .table-responsive-xl {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Suaviza el scroll en dispositivos táctiles */
            display: block;
            /* Asegura que se comporta como un bloque */
        }
    </style>





