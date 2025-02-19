<table id="file_export" class="text-center table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>


            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th>ID</th>


            <th>Dni</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Nombres</th>
            <th> <i class="ti ti-brand-whatsapp fs-7"style="color:green;"></i></th>
            <th>Celular </th>
            <th>Proyecto</th>
            <th>Mensaje</th>
            <th>Fecha</th>


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
          


                <td>{{ $Customers->id }}</td>


                <td>{{ $Customers->dni }}</td>

                <td>{{ $Customers->firstname }}</td>
                <td>{{ $Customers->lastname }}</td>
                <td>{{ $Customers->names }}</td>
                <td>
                    @php
                        $whatsapp = 'https://api.whatsapp.com/send?phone=' . $Customers->cellphone;
                    @endphp
                    <a target="_blank" href="{{ $whatsapp }}">
                        <i class="ti ti-brand-whatsapp fs-7"style="color:green;"></i>

                    </a>
                </td>
                <td>
                    {{ $Customers->cellphone }}
                </td>
                <td>
                    {{ $Customers->project->title }}</td>
                </td>
                <td>
                    {{ $Customers->message }}
                </td>
                <td>
                    {{ $Customers->created_at }}
                </td>




            </tr>
        @endforeach
    </tbody>

</table>








<script></script>
