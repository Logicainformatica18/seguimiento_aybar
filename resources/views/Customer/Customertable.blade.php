<div class="table-responsive-xl">
<table id="file_export" class="text-center table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>


            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th>ID</th>


            <th>Proyecto</th>
            <th>Lote</th>
            <th>Aux</th>
            <th>Cliente_1</th>
            <th>Dni_1</th>

            <th>Socio comercial</th>

            <th>Fecha de Separación</th>
            <th>Precio de Lista de Inventario</th>
            <th>Descuento %</th>
            <th>Importe de Venta</th>
            <th>Estado</th>
            <th>Dias_1</th>
            <th>Redactado Por</th>
            <th>Fecha Redactado</th>
            <th>Ingreso a Operaciones</th>

            <th>Recogido no devuelto</th>
            <th>Dias_2</th>
            <th>Fecha Contrato Firmado Devueldo</th>
            <th>Adenda Refinanciamiento</th>
            <th>j2</th>
            <th>Enviado a archivo</th>
            <th>Virtual</th>
            <th>Notaria</th>
            <th>Chincha</th>
            <th>Post Venta</th>
            <th>Proceso de desistimiento</th>
            <th>Proceso de Resolución</th>
            <th>Cambio de Titular</th>
            <th>Desistimiento</th>
            <th>Comisiones</th>
            <th>Cantidad de Letras</th>
            <th>Letras Verificadas</th>
            <th>Observaciones</th>





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



            <td>EX-{{ $Customers->id }}</td>
            <td>{{ $Customers->Project->description }}</td>
            <td>{{ $Customers->lote }}</td>
            <td>{{ $Customers->aux }}</td>
            <td>{{ $Customers->cliente_1 }}</td>
            <td>{{ $Customers->dni }}</td>

            <td>{{ $Customers->Business_partner->description }}</td>

            <td>{{ $Customers->fecha_de_separacion }}</td>
            <td>{{ $Customers->precio_de_lista_inventario }}</td>
            <td>{{ $Customers->descuento_porcentaje }}</td>
            <td>{{ $Customers->importe_de_venta }}</td>
            <td>{{ $Customers->Status->description }}</td>
            <td>{{ $Customers->dias_1 }}</td>
            <td>{{ $Customers->Editor->description }}</td>
            <td>{{ $Customers->REDACTADO }}</td>
            <td>{{ $Customers->ingreso_a_operaciones }}</td>
            <td>{{ $Customers->recogido_no_devuelto }}</td>
            <td>{{ $Customers->dias_2 }}</td>
            <td>{{ $Customers->fecha_contrato_firmado_devuelto }}</td>
            <td>{{ $Customers->adenda_refinanciamiento }}</td>
            <td>{{ $Customers->j2 }}</td>
            <td>{{ $Customers->enviado_a_archivo }}</td>
            <td>{{ $Customers->virtual }}</td>
            <td>{{ $Customers->notaria }}</td>
            <td>{{ $Customers->chincha }}</td>
            <td>{{ $Customers->post_venta }}</td>
            <td>{{ $Customers->proceso_de_desistimiento }}</td>
            <td>{{ $Customers->proceso_de_resolucion }}</td>
            <td>{{ $Customers->cambio_de_titular }}</td>
            <td>{{ $Customers->desistimiento }}</td>
            <td>{{ $Customers->comisiones }}</td>
            <td>{{ $Customers->cantidad_de_letras }}</td>
            <td>{{ $Customers->letras_verificadas }}</td>
            <td>{{ $Customers->observaciones }}</td>






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
