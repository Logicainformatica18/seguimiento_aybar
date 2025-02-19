
<table id="file_export" class=" table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>
            
           
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th>ID</th>
            <th>Descripción</th>
            <th>Página</th>
            <th>Nivel</th>
            <th>Editado por:</th>
            {{-- <th>Color</th> --}}
            <th>Detalle</th>

        </tr>
        <!-- end row -->
    </thead>
    <tbody>
        @foreach ($section as $sections)
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
                                    <a     onclick="sectionEdit('{{ $sections->id }}'); Up();  return false"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                onclick="sectionDestroy('{{ $sections->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
    
                </td>
              



                <td>{{ $sections->id }}</td>
               
                
                <td>{{ $sections->description }}</td>
                @php
                    $secciones =array("secciones","Plantilla","Inicio","Nosotros","Proyectos","Blog","Contáctanos")
                @endphp
                <td>{{ $secciones[$sections->module] }}</td>
                <td>{{ $sections->nivel }}</td>
                <td>{{ $sections->user->firstname }} {{ $sections->user->names }}</td>
                {{-- <td>{{ $sections->color }}</td> --}}

                <td>{{ $sections->detail }}</td>
               
             


            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <!-- start row -->
        <tr>
          
        <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
        <th>ID</th>
        <th>Descripción</th>
        <th>Página</th>
        <th>Nivel</th>
        <th>Editado por:</th>
        {{-- <th>Color</th> --}}
        <th>Detalle</th>
        </tr>
        <!-- end row -->
    </tfoot>
</table>








    <script>
 
      </script>
    