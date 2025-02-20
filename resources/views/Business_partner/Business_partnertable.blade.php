<table id="file_export" class="table table-hover table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th>
                <img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt="">
            </th>
            <th>ID</th>




            <th>Descripción</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($Business_partner as $Business_partners)
            <tr>
                <!-- Menú Desplegable -->
                <td>
                    <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @canany(['administrar', 'editar'])
                                <li>
                                    <a onclick="Business_partnerEdit('{{ $Business_partners->id }}'); Up(); return false"
                                        data-bs-toggle="modal" data-bs-target="#success-header-modal"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i> Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                        onclick="Business_partnerDestroy('{{ $Business_partners->id }}'); return false">
                                        <i class="fs-4 ti ti-trash"></i> Eliminar
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </td>


                <td>{{ $Business_partners->id }}</td>






                <td>{{ $Business_partners->description }}</td>



            </tr>
        @endforeach
    </tbody>

</table>
