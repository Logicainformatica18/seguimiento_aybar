    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title"style="font-family:Montserrat-Bold">Tabla de mantenimiento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- DataTables -->
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <th></th>
                                    <th><img width="20"
                                            src="https://cdn-icons-png.flaticon.com/512/6671/6671938.png" alt=""
                                            srcset=""></th>
                                    <th class="sorting">ID</th>
                                    <th class="sorting">Curso</th>

                                    <th class="sorting">Descripción</th>
                                    <th class="sorting">Instructor</th>
                                    <th class="sorting">Puntos</th>
                                    <th class="sorting">Ver Contenido</th>
                                    <th class="sorting">Video</th>
                                    <th class="sorting">Archivos</th>
                                    <th class="sorting">PDF 1</th>
                                    <th class="sorting">PDF 2</th>

                                    <th class="sorting">Categorías</th>
                                    <th class="sorting">Detalle</th>

                                </thead>
                                <tbody>
                                    @foreach ($topic as $topics)
                                        <tr>
                                            <td></td>
                                            <td>
                                                @role('Coordinación|Administrador')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-success note-icon-pencil"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        onclick="topicEdit('{{ $topics->id }}'); Up();  return false"></button>

                                                    <!-- <button class="note-icon-pencil" ></button> -->
                                                    <button class="btn btn-danger note-icon-trash"
                                                        onclick="topicDestroy('{{ $topics->id }}'); return false"></button>
                                                @endrole

                                            </td>
                                            <td>{{ $topics->id }}</td>

                                            <td>{{ $topics->course->description }}</td>
                                            <td>{{ $topics->description }}</td>
                                            <td>{{ $topics->user->names }}</td>
                                            <td>{{ $topics->point }}</td>
                                            <td><a target="_blank"
                                                    href="cursos/{{ $topics->course->id }}/tema/{{ $topics->id }}">Ver</a>
                                            </td>

                                            <td><a target="_blank" href="{{ asset($topics->video) }}"
                                                >{{ $topics->video }}
                                            </a>
                                        </td>

                                            @php
                                                $resource_1 = 'resource/' . $topics->resource_1;
                                            @endphp
                                            <td><a target="_blank" href="{{ asset($resource_1) }}"
                                                    download="{{ $topics->resource_1 }}">{{ $topics->resource_1 }}
                                                </a>
                                            </td>
                                            @php
                                                $file_1 = 'file/' . $topics->file_1;
                                            @endphp
                                            <td><a target="_blank" href="{{ asset($file_1) }}"
                                                    download="{{ $topics->file_1 }}">{{ $topics->file_1 }}
                                                </a>
                                            </td>

                                            @php
                                                $file_2 = 'file/' . $topics->file_2;
                                            @endphp
                                            <td><a target="_blank" href="{{ asset($file_2) }}"
                                                    download="{{ $topics->file_2 }}">{{ $topics->file_2 }}
                                                </a>
                                            </td>


                                            <td>
                                                @foreach ($topics->categoryDetail as $item)
                                                    {{ $item->category->description . ' ' }}
                                                @endforeach
                                            </td>
                                            <td>{{ $topics->detail }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
