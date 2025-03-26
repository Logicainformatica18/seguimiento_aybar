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

                <th class="d-none estado">Estado</th>

                <th class="d-none redaccion">Redactor</th>
                <th class="d-none redaccion">Ingreso a Operaciones</th>
                <th class="d-none redaccion">Dias 1</th>
                <th class="d-none redaccion">Redactado</th>
                <th class="d-none redaccion">Fecha Emisión</th>
                <th class="d-none redaccion">Observaciones </th>


                <th class="d-none fedateador">Fecha Retiro Contrato</th>
                <th class="d-none fedateador">Días</th>
                <th class="d-none fedateador">Letras Devueltas</th>
                <th class="d-none fedateador">Fecha Devolución</th>
                <th class="d-none fedateador">Tipo Contrato</th>
                <th class="d-none fedateador">Observaciones a Regularizar</th>
                <th class="d-none fedateador">Dias de entrega para correción</th>
                <th class="d-none fedateador">Dias estimado de entrega</th>
                <th class="d-none fedateador">Fecha Entrega</th>
                <th class="d-none fedateador">Fecha Contrato Regularizado</th>
                <th class="d-none fedateador">Hora De La Devolución De Regularización</th>
                <th class="d-none fedateador">Hora DE La recepción</th>
                <th class="d-none fedateador">Hora de reporte</th>
                <th class="d-none fedateador">Tiempo Transcurrido</th>
                <th class="d-none fedateador">Indicador</th>
                <th class="d-none fedateador">Entregado Operaciones 2</th>
                <th class="d-none fedateador">Observaciones</th>

                <th class="d-none comision">Pago de Comisión</th>
                <th class="d-none comision">Ingreso a Cartera</th>

                <th class="d-none desistimiento">Solicitud Desest. Resolución</th>
                <th class="d-none desistimiento">Fecha</th>
                <th class="d-none desistimiento">Desistido Por</th>
                <th class="d-none desistimiento">Contrato Físico</th>
                <th class="d-none desistimiento">Teléfono</th>
                <th class="d-none desistimiento">Correo</th>
                <th class="d-none desistimiento">Acuerdo Firmado</th>
                <th class="d-none desistimiento">Boletas</th>
                <th class="d-none desistimiento">Tipo Operación</th>
                <th class="d-none desistimiento">Observaciones</th>

                <th >Estado___</th>


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
                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical fs-6"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                <li>
                                    <a href="javascript:void(0)" onclick="toggleEstado(this)"
                                        class="dropdown-item d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-plus"></i> Estado
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="toggleRedaccion(this)"
                                        class="dropdown-item d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-plus"></i> Redacción
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="toggleFedateador(this)"
                                        class="dropdown-item d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-plus"></i> Fedateador
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="toggleDesistimiento(this)"
                                        class="dropdown-item d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-plus"></i> Desistimiento
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="toggleComision(this)"
                                        class="dropdown-item d-flex align-items-center gap-3">
                                        <i class="fs-4 ti ti-plus"></i> Comisión
                                    </a>
                                </li>
                                @canany(['administrar', 'editar'])
                                    <li>
                                        <a onclick="CustomerEdit('{{ $Customers->id }}'); Up();  return false"
                                            data-bs-toggle="modal" data-bs-target="#success-header-modal"
                                            fdprocessedid="cw61t3" class="dropdown-item d-flex align-items-center gap-3"
                                            href="javascript:void(0)">
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


                    <!-- comercial  -->
                    <td class="comercial">EX-{{ $Customers->id }}</td>
                    <td class="comercial">{{ $Customers->Project->description }}</td>
                    <td class="comercial">{{ $Customers->lote }}</td>
                    <td class="comercial">{{ $Customers->cliente_1 }}</td>
                    <td class="comercial">{{ $Customers->dni }}</td>
                    <td class="comercial">{{ $Customers->Business_partner->description }}</td>
                    <td class="comercial">{{ number_format($Customers->importe_de_venta, 2, '.', ',') }}</td>
                    <!-- sin grupo -->
                    <td class="comercial">{{ $Customers->pre_acuerdo }}</td><!-- crear -->
                    <td class="comercial">{{ $Customers->inicial_pagada }}</td><!-- crear -->
                    <td class="comercial">{{ $Customers->fecha_de_inicial }}</td><!-- crear -->
                    <td class="comercial">{{ $Customers->monto_de_inicial }}</td><!-- crear -->
                    <!-- Estado -->
                    <td class="d-none estado">{{ $Customers->Status->description }}</td>

                    <!-- Redactador  -->
                    <td class="d-none redaccion">{{ $Customers->Editor->description }}</td>
                    <td class="d-none redaccion">{{ $Customers->ingreso_a_operaciones }}</td>
                    <td class="d-none redaccion">
                        {{ $Customers->ingreso_a_operaciones ? \Carbon\Carbon::parse($Customers->ingreso_a_operaciones)->diffInDays(now()) : 0 }}
                    </td>
                    <td class="d-none redaccion">{{ $Customers->REDACTADO }}</td>
                    <td class="d-none redaccion">{{ $Customers->fecha_emision }}</td><!-- crear -->
                    <td class="d-none redaccion">{{ $Customers->observaciones }}</td>

                    <!-- Fedateador  -->
                    <td class="d-none fedateador">{{ $Customers->fecha_contrato_firmado_devuelto }}</td> <!-- crear -->
                    <td class="d-none fedateador">
                        {{ $Customers->fecha_contrato_firmado_devuelto ? \Carbon\Carbon::parse($Customers->fecha_contrato_firmado_devuelto)->diffInDays(now()) : 0 }}
                    </td>
                    <td class="d-none fedateador">{{ $Customers->letras_devueltas }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->fecha_devolucion }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->tipo_contrato }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->observacion_regularizar }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->dia_entrega_correcion }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->dia_estimado_entrega }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->fecha_entrega }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->fecha_contrato_regularizado }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->hora_devolucion_regularizacion }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->hora_recepcion }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->hora_reporte }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->tiempo_transcurrido }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->indicador }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->entregado_operaciones_2 }}</td> <!-- crear -->
                    <td class="d-none fedateador">{{ $Customers->observaciones_2 }}</td> <!-- crear -->

                    <!-- comision   SIN GRUPO-->
                    <td class="d-none comision">{{ $Customers->pago_comision }}ggg</td> <!--si/no crear -->
                    <td class="d-none comision">{{ $Customers->ingreso_cartera }}gggggg</td> <!--si/no crear -->

        <!-- desistimiento -->
        <td class="d-none desistimiento">{{ $Customers->solicitud_desistimiento_resolucion }}</td>
        <td class="d-none desistimiento">{{ $Customers->desistimiento_fecha }}</td>
        <td class="d-none desistimiento">{{ $Customers->desistido_por }}</td>
        <td class="d-none desistimiento">{{ $Customers->contrato_fisico }}</td>
        <td class="d-none desistimiento">{{ $Customers->telefono }}</td>
        <td class="d-none desistimiento">{{ $Customers->correo }}</td>
        <td class="d-none desistimiento">{{ $Customers->acuerdo_firmado }}</td>
        <td class="d-none desistimiento">{{ $Customers->boletas }}</td>
        <td class="d-none desistimiento">{{ $Customers->tipos_operacion }}</td>
        <td class="d-none desistimiento">{{ $Customers->desistimiento_observacion }}</td>

                   <!-- SIN GRUPO ESTADO 2 -->
        <td >{{ $Customers->estado_2 }}-</td>






                    {{-- <td class="d-none redaccion">{{ $Customers->dias_2 }}</td> --}}





                    {{-- <td class="comercial">{{ $Customers->cliente_2 }}</td>
                <td class="comercial">{{ $Customers->dni_2 }}</td>
                <td class="comercial">{{ $Customers->cliente_3 }}</td>
                <td class="comercial">{{ $Customers->dni_3 }}</td>
                <td class="comercial">{{ $Customers->cliente_4 }}</td>
                <td class="comercial">{{ $Customers->dni_4 }}</td>
                <td class="comercial">{{ $Customers->cliente_5 }}</td>
                <td class="comercial">{{ $Customers->dni_51 }}</td> --}}
                    {{--
                <td class="comercial">{{ substr($Customers->fecha_de_separacion,0,10) }}</td>


                <td class="d-none no_group">{{ $Customers->precio_de_lista_inventario }}</td> <!-- sin grupo -->
                <td class="d-none no_group">{{ $Customers->descuento_porcentaje }}</td> <!-- sin grupo -->


                <td class="d-none no_group">{{ $Customers->recogido_no_devuelto }}</td> <!-- sin grupo -->
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
<script>
    const scrollContainer = document.querySelector('.table-responsive-xl');

    let isDown = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        scrollContainer.classList.add('active'); // opcional: puedes usar esto para cambiar el cursor
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
    });

    scrollContainer.addEventListener('mouseup', () => {
        isDown = false;
        scrollContainer.classList.remove('active');
    });

    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 1.5; // velocidad de desplazamiento
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
</script>
<style>
    .table-responsive-xl.active {
        cursor: grabbing;
        cursor: -webkit-grabbing;
    }

    .table-responsive-xl {
        cursor: grab;
        cursor: -webkit-grab;
    }
</style>
