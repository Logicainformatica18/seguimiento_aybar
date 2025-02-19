
<table id="file_export" class=" table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>
            
          
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                    srcset=""></th>
            <th>ID</th>
            <th>Título</th>
            <th>Departamento</th>
            <th>Imágen</th>
            <th>Descripción</th>
            <th>Detalle</th>
            

        </tr>
        <!-- end row -->
    </thead>
    <tbody>
        @foreach ($Project as $Projects)
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
                                    <a  onclick="ProjectEdit('{{ $Projects->id }}'); Up();  return false" data-bs-toggle="modal"
                                        data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                onclick="ProjectDestroy('{{ $Projects->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
    
                </td>

           



                <td>{{ $Projects->id }}</td>
               
                <td>{{ $Projects->title }}</td>  
                <td>{{ $Projects->country }}</td>  
                <td>
                  @if ($Projects->image_1!="")
                  <img width="70px" src="{{url('../resource/'.$Projects->image_1 )}}" alt="" srcset="">
                    

                  @endif
                   
                 </td>                 
                <td>{{ $Projects->description }}</td>

                <td>{{ $Projects->detail }}</td>
               
             


            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <!-- start row -->
        <tr>
            
        <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
        <th>ID</th>
        <th>Título</th>
        <th>Imágen</th>
        <th>Descripción</th>
        <th>Detalle</th>
        
        </tr>
        <!-- end row -->
    </tfoot>
</table>








    <script>
 
      </script>
    