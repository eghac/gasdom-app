@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Solicitudes de instalación</h2>
            <ol class="breadcrumb">
                <li>
                    Instalación
                </li>
                <li class="active">
                    <strong>Solicitudes</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="{{ url('instalacion/crear') }}"><button class="btn btn-success"> Crear solicitud</button></a>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de Registro</th>
                                    <th>Estado de instalación</th>
                                    <th>Categoría de instalación</th>
                                    <th>Funciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($instalaciones as $instalacion)
                                        <tr class="gradeX">
                                            <td>{{ $instalacion->id }}</td>
                                            <td> {{ $instalacion->created_at }}</td>
                                            <td><span class="badge badge-{{ $instalacion->estadoInstalacion->icono  }}">{{ $instalacion->estadoInstalacion->estado_instalacion_descripcion }}</span> </td>
                                            <td> {{ $instalacion->categoriaInstalacion->categoria_instalacion_descripcion }}</td>
                                            <td class="center">
                                                <a href="{{ route('instalacion/mostrar',['id' => $instalacion->id]) }}"><button class="btn btn-danger">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button></a>
                                                <a href="{{ route('instalacion/editar',['id' => $instalacion->id]) }}">
                                                    <button class="btn btn-default">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')


        <script src="{{ asset('site/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('site/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ asset('site/js/plugins/dataTables/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    pageLength: 25,
                    responsive: true,
                    ordering: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                            customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            },
                            title:'Reportes de Instalaciones'
                        }
                    ]

                });
            });

        </script>

        <!-- Custom and plugin javascript -->
        <script src="{{ asset('site/js/inspinia.js') }}"></script>
        <script src="{{ asset('site/js/plugins/pace/pace.min.js') }}"></script>
        <script>
            $(function () {
                @if(Session::has('STORE_CLIENTE') && Session::get('STORE_CLIENTE') == '1')
                showToast("Cliente","Registro del cliente exitoso","success");
                {{ Session::forget('STORE_CLIENTE') }}
                @endif
            });
        </script>
    @endpush

@endsection