<div class="table-responsive-xl">
    <table id="file_export" class=" table table-hover table-bordered table-striped table-responsive">
        <thead>
            <!-- start row -->
            <tr>


                <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                        srcset=""></th>

                {{-- <th>Acción</th> --}}
                <th>Código</th>
                <th>Cliente</th>
                <th>DNI</th>
                <th>Proyecto</th>
                <th>Manzana</th>
                <th>Lote</th>

                <th>Fecha de cita</th>
                <th>Hora de cita</th>
                <th>Motivo</th>
                <th>Estado</th>


                <th>Restante</th>

                <th>Fecha Generada</th>
                <th>Fecha Reprogramada</th>





            </tr>
            <!-- end row -->
        </thead>
        <tbody>
            @foreach ($cite as $cites)
                <tr>

                    <td>
                        <div class="dropdown dropstart">
                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical fs-6"></i>
                            </a>
                            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">

                            @canany(['administrar', 'editar'])
                                <li>
                                    <a onclick="citeEdit('{{ $cites->id }}'); Up();  return false" data-bs-toggle="modal"
                                        data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                onclick="citeDestroy('{{ $cites->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany
                        </ul> --}}
                        </div>

                    </td>





                    {{-- <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#success-header-modal"
                            fdprocessedid="cw61t3"
                            onclick="citeEdit('{{ $cites->id_cita }}');return false"style="width: 100px">+ Ver
                            más</button>
                    </td> --}}
                    <td>{{ $cites->codigo }}</td>
                    <td>{{ $cites->customer->Razon_Social }}</td>
                    <td>{{ $cites->customer->DNI }}</td>
                    <td>{{ $cites->proyecto }}</td>
                    <td>{{ $cites->manzana }}</td>
                    <td>{{ $cites->lote }}</td>

                    <td>{{ $cites->fecha }}</td>
                    <td>{{ $cites->hora }}</td>
                    <td>{{ $cites->motivo }}</td>
                    <td>
                        <span
                            class="badge
                        @switch($cites->estado)
                            @case('Pendiente') bg-success @break
                            @case('Proceso') " style="   background-color: #6f42c1 @break
                            @case('Atendido') bg-info @break
                            @case('Observado') bg-danger @break
                            @case('Finalizado') text-black bg-light @break
                            @case('Cerrado')  bg-dark @break
                            @case('Derivado') bg-secondary @break
                            @default bg-primary
                        @endswitch">
                            {{ $cites->estado }}
                        </span>
                    </td>


                    @php

                        $estadoFecha = '';

                        // Verificar si el estado NO es 'Atendido', 'Cerrado' o 'Finalizado'
                        if (!in_array($cites->estado, ['Atendido', 'Cerrado', 'Finalizado'])) {
                            // Obtener la fecha actual en la zona horaria correcta
                            $fecha_actual = \Carbon\Carbon::now('America/Lima');

                            // Convertir `fecha_cita` y `fecha_repro` en objetos \Carbon\Carbon (solo si son fechas válidas)
                            $fecha_cita =
                                strtotime($cites->fecha) !== false
                                    ? \Carbon\Carbon::parse($cites->fecha, 'America/Lima')
                                    : null;
                            $fecha_repro =
                                strtotime($cites->fecha_repro) !== false
                                    ? \Carbon\Carbon::parse($cites->fecha_repro, 'America/Lima')
                                    : null;

                            try {
                                $dias_diferencia = 0;

                                // Calcular la diferencia en días (si hay una fecha válida de reprogramación, usar esa)
                                if ($fecha_repro) {
                                    $dias_diferencia = $fecha_actual->diffInDays($fecha_repro, false);
                                } elseif ($fecha_cita) {
                                    $dias_diferencia = $fecha_actual->diffInDays($fecha_cita, false);
                                } else {
                                    $estadoFecha = 'Por Definir'; // Si ambas fechas son inválidas
                                }

                                // Determinar el estado de la fecha
                                if ($dias_diferencia == 0 && $fecha_cita != '') {
                                    $estadoFecha = 'Hoy';
                                } elseif ($dias_diferencia > 0) {
                                    $estadoFecha = "$dias_diferencia días";
                                } else {
                                    $estadoFecha = 'Vencido';
                                }
                            } catch (\Exception $e) {
                                $estadoFecha = 'Error en fecha';
                            }
                        }
                    @endphp

                    <td>
                        {{ $estadoFecha }}
                    </td>


                    {{-- <td>{{ $cites->descripcion }}</td> --}}

                    <td>{{ $cites->fechag }}</td>
                    <td>{{ $cites->fecha_repro }}</td>







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






<script></script>
