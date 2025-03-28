<div class="table-responsive-xl">
    <table id="file_export" class="text-center table table-hover table-bordered table-striped table-responsive">

        <thead>
            <tr>
                <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""></th>
                <th class="comercial">ID</th>

                <!-- Comercial -->
                <th class="comercial">Proyecto</th>
                <th class="comercial">Mz - LT</th>
                <th class="comercial">Cliente 1</th>
                <th class="comercial">DNI 1</th>
                <th class="comercial">Socio Comercial</th>
                <th class="comercial">Fecha de Separación</th>
                <th class="comercial">Monto de Separación</th>
                <th class="comercial">Asistente</th>
                <th class="comercial">Inicial Pagada</th>
                <th class="comercial">Fecha de Inicial</th>
                <th class="comercial">Monto de Inicial</th>

                <!-- Redacción -->
                <th class="d-none redaccion">Cliente 2</th>
                <th class="d-none redaccion">DNI 2</th>
                <th class="d-none redaccion">Cliente 3</th>
                <th class="d-none redaccion">DNI 3</th>
                <th class="d-none redaccion">Cliente 4</th>
                <th class="d-none redaccion">DNI 4</th>
                <th class="d-none redaccion">Ingreso a Operaciones</th>
                <th class="d-none redaccion">Días</th>
                <th class="d-none redaccion">Redactado Por</th>
                <th class="d-none redaccion">Fecha de Emisión</th>
                <th class="d-none redaccion">Observaciones Redacción</th>

                <!-- Redacción / Fedateo / Archivo - Tesorería -->
                <th class="d-none estado">Estado</th>

                <!-- Fedateador -->
                <th class="d-none fedateador">Fecha de Retiro de Contrato</th>
                <th class="d-none fedateador">Días Transcurridos</th>
                <th class="d-none fedateador">Letras Devueltas</th>
                <th class="d-none fedateador">Fecha de Devolución</th>
                <th class="d-none fedateador">Tipo de Contrato</th>
                <th class="d-none fedateador">Observaciones a Regularizar</th>
                <th class="d-none fedateador">Día de Entrega para Corrección</th>
                <th class="d-none fedateador">Día Estimado de Entrega</th>
                <th class="d-none fedateador">Día Real de la Entrega</th>
                <th class="d-none fedateador">Fecha de Contrato Regularizado</th>
                <th class="d-none fedateador">Hora de Devolución de Regularización</th>
                <th class="d-none fedateador">Hora de Recepción</th>
                <th class="d-none fedateador">Hora de Reporte</th>
                <th class="d-none fedateador">Tiempo Transcurrido</th>
                <th class="d-none fedateador">Indicador</th>
                <th class="d-none fedateador">Entregado a Operaciones 2</th>
                <th class="d-none fedateador">Observaciones</th>

                <!-- Tesorería - Archivo -->
                <th class="d-none tesoreria">Comisión Pagada</th>
                <th class="d-none tesoreria">Escaneo de Contrato</th>

                <!-- Desistimiento -->
                <th class="d-none desistimiento">Tipo de Solicitud</th>
                <th class="d-none desistimiento">Fecha de Desistimiento</th>
                <th class="d-none desistimiento">Cancelado Por</th>
                <th class="d-none desistimiento">Contrato Físico</th>
                <th class="d-none desistimiento">Teléfono</th>
                <th class="d-none desistimiento">Correo</th>
                <th class="d-none desistimiento">Acuerdo Firmado</th>
                <th class="d-none desistimiento">Boletas</th>
                <th class="d-none desistimiento">Tipo de Operación</th>
                <th class="d-none desistimiento">Observación</th>
                <th class="d-none desistimiento">Estado del Lote</th>
            </tr>
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
                    <td class="comercial">EX-{{ $Customers->id }}</td>
                    <!-- Comercial -->
                    <td class="comercial">{{ $Customers->Project->description ?? '' }}</td>
                    <td class="comercial">{{ $Customers->mz_lt }}</td>
                    <td class="comercial">{{ $Customers->client_1 }}</td>
                    <td class="comercial">{{ $Customers->dni_1 }}</td>
                    <td class="comercial">{{ $Customers->Business_partner->description ?? '' }}</td>
                    <td class="comercial">{{ $Customers->separation_date }}</td>
                    <td class="comercial">{{ $Customers->separation_amount }}</td>
                    <td class="comercial">{{ $Customers->Assistant->name ?? '' }}</td>
                    <td class="comercial">{{ $Customers->initial_paid }}</td>
                    <td class="comercial">{{ $Customers->initial_payment_date }}</td>
                    <td class="comercial">{{ $Customers->initial_amount }}</td>

                    <!-- Redacción -->
                    <td class="d-none redaccion">{{ $Customers->client_2 }}</td>
                    <td class="d-none redaccion">{{ $Customers->dni_2 }}</td>
                    <td class="d-none redaccion">{{ $Customers->client_3 }}</td>
                    <td class="d-none redaccion">{{ $Customers->dni_3 }}</td>
                    <td class="d-none redaccion">{{ $Customers->client_4 }}</td>
                    <td class="d-none redaccion">{{ $Customers->dni_4 }}</td>
                    <td class="d-none redaccion">{{ $Customers->operations_entry }}</td>
                    <td class="d-none redaccion">{{ $Customers->days }}</td>
                    <td class="d-none redaccion">{{ $Customers->drafted_by }}</td>
                    <td class="d-none redaccion">{{ $Customers->issue_date }}</td>
                    <td class="d-none redaccion">{{ $Customers->redaction_observations }}</td>

                    <!-- Estado -->
                    <td class="d-none estado">{{ $Customers->Status->description ?? '' }}</td>

                    <!-- Fedateador -->
                    <td class="d-none fedateador">{{ $Customers->contract_withdrawal_date }}</td>
                    <td class="d-none fedateador">{{ $Customers->elapsed_days }}</td>
                    <td class="d-none fedateador">{{ $Customers->returned_letters }}</td>
                    <td class="d-none fedateador">{{ $Customers->return_date }}</td>
                    <td class="d-none fedateador">{{ $Customers->contract_type }}</td>
                    <td class="d-none fedateador">{{ $Customers->regularization_observations }}</td>
                    <td class="d-none fedateador">{{ $Customers->correction_delivery_day }}</td>
                    <td class="d-none fedateador">{{ $Customers->estimated_delivery_day }}</td>
                    <td class="d-none fedateador">{{ $Customers->actual_delivery_day }}</td>
                    <td class="d-none fedateador">{{ $Customers->regularized_contract_date }}</td>
                    <td class="d-none fedateador">{{ $Customers->regularization_return_time }}</td>
                    <td class="d-none fedateador">{{ $Customers->reception_time }}</td>
                    <td class="d-none fedateador">{{ $Customers->report_time }}</td>
                    <td class="d-none fedateador">{{ $Customers->elapsed_time }}</td>
                    <td class="d-none fedateador">{{ $Customers->indicator }}</td>
                    <td class="d-none fedateador">{{ $Customers->delivered_to_operations_2 }}</td>
                    <td class="d-none fedateador">{{ $Customers->observations }}</td>

                    <!-- Tesorería - Archivo -->
                    <td class="d-none tesoreria">{{ $Customers->commission_paid }}</td>
                    <td class="d-none tesoreria">{{ $Customers->contract_scanned }}</td>

                    <!-- Desistimiento -->
                    <td class="d-none desistimiento">{{ $Customers->cancellation_request_type }}</td>
                    <td class="d-none desistimiento">{{ $Customers->cancellation_date }}</td>
                    <td class="d-none desistimiento">{{ $Customers->cancelled_by }}</td>
                    <td class="d-none desistimiento">{{ $Customers->physical_contract }}</td>
                    <td class="d-none desistimiento">{{ $Customers->phone }}</td>
                    <td class="d-none desistimiento">{{ $Customers->email }}</td>
                    <td class="d-none desistimiento">{{ $Customers->signed_agreement }}</td>
                    <td class="d-none desistimiento">{{ $Customers->receipts }}</td>
                    <td class="d-none desistimiento">{{ $Customers->operation_type }}</td>
                    <td class="d-none desistimiento">{{ $Customers->observation }}</td>
                    <td class="d-none desistimiento">{{ $Customers->lot_status }}</td>
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
