<form id="deleteAll">
<table id="file_export" class=" table table-hover table-bordered table-striped table-responsive">
    <thead>
        <!-- start row -->
        <tr>
            
          
            <th class="sort">
          
                <input id="check_massive" type="checkbox"onclick="selectCheckAll();" class="form-check-input" name="" id="">
            </th>
                    <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                        srcset=""></th>
            <th>ID</th>
            <th>Título</th>
            <th>Url</th>
           

            <th>Descripción</th>
            <th>Detalle</th>
            

        </tr>
        <!-- end row -->
    </thead>
   
        @csrf
    <tbody>
        @foreach ($Image as $Images)
            <tr>
                <td>
                    <input type="checkbox"class="form-check-input rowCheckbox" name="deleteAll[]" value="{{$Images->id}}">
                </td>
                <td>
                    <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                           
                            @canany(['administrar', 'editar'])
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#success-header-modal" fdprocessedid="cw61t3"
                                    onclick="ImageEdit('{{ $Images->id }}'); Up();  return false" 
                                        class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)">
                                        <i class="fs-4 ti ti-edit"></i>Editar
                                    </a>
                                </li>
                            @endcanany
                            @canany(['administrar', 'eliminar'])
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"
                                onclick="ImageDestroy('{{ $Images->id }}'); return false">
                                    <i class="fs-4 ti ti-trash"></i>Delete
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
    
                </td>

               



                <td>{{ $Images->id }}</td>
               
                <td>{{ $Images->title }}</td>
                <td><a target="_blank" href="{{url('resource/'.$Images->url)}}">{{url('resource/'.$Images->url)}}
                </a>
                    </td>        
                    
                <td>{{ $Images->description }}</td>

                <td>{{ $Images->detail }}</td>
               
             


            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <!-- start row -->
        <tr>
            <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
        <th><img width="20" src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                srcset=""></th>
        <th>ID</th>
        <th>Título</th>
        <th>Url</th>
       

        <th>Descripción</th>
        <th>Detalle</th>
        
        </tr>
        <!-- end row -->
    </tfoot>
</table>
</form>







    <script>
 
      </script>
    