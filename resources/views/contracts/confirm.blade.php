@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => 'Contratos'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Contratos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contratos</a></li>
        <li class="breadcrumb-item active">Confirmar</li>
    </ol>
    <div class="page-header-actions">
        <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo
        </a>
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        {{-- <a href="{{ Redirect::back() }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i>Regresar
        </a> --}}
    </div>
</div>
<div class="page-content">
    <form action="{{ route('contracts.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    @csrf
        <!-- Primer Panel -->
        <div class="panel">
            <div class="panel-heading">
            <input type="hidden" name="name" value="{{ $name}}">
            <input type="hidden" name="message" value="{{ $message }}">
            <h3 class="panel-title">{{ $name }}:
                <small>{{ $message }}</small>
            </h3>
            @foreach ($users_id as $value => $id)
                <input type="hidden" name="guest_id{{ $value }}" value="{{ $id }}">
            @endforeach
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-lg-4">
                        <div class="example-wrap">
                            <h4 class="example-title">Nombres</h4>
                            <ul class="list-group list-group-dividered list-group-full">
                                @foreach ($users_name as $value => $name)
                                    @if ($name == 'Invitado')
                                        <input type="text" id="signerTwo" name="guest_name{{ $value }}" class="form-control" placeholder="Escribe el nombre..." autofocus required>
                                    @else
                                        <input type="hidden" name="guest_name{{ $value }}" value="{{ $name }}">
                                        <li class="list-group-item">{{ $name }}</li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="example-wrap">
                            <h4 class="example-title">Correos</h4>
                            <ul class="list-group list-group-dividered list-group-full">
                                <input type="hidden" name="nmails" value="{{ $nmails }}">
                                @foreach ($users_email as $value => $email)
                                    <input type="hidden" name="guest_email{{ $value }}" value="{{ $email }}">
                                    <li class="list-group-item">{{ $email }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Example Sidebar -->
                        <div class="example-wrap">
                            <h4 class="example-title">Archivo</h4>
                            <div class="example">
                                <h6 class="example-title">{{ $file->name }}</h6>
                                <input type="hidden" name="file_id" value="{{ $file->id }}">
                                <input type="hidden" name="type" value="Grupal">

                                <button class="btn btn-primary" data-target="#examplePositionSidebar" data-toggle="modal" type="button">Ver archivo</button>

                                <!-- Modal -->
                                <div class="modal fade" id="examplePositionSidebar" aria-hidden="true" aria-labelledby="examplePositionSidebar"
                                    role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple modal-sidebar modal-xl" style="max-width: 50%; width:100%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title">{{ $file->name }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <iframe width="100%" height="500" src="{{ asset('storage') }}/{{ $file->file }}" frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            </div>
                        </div>
                        <h4 class="example-title">¿Todo bien?</h4>
                        <p>Da click en contiuar para enviar las invitaciones y firmar el contrato</p>
                        <button type="submit" class="btn btn-info btn-block" data-dismiss="modal">Siguiente</button>
                        <!-- End Example Sidebar -->
                    </div>
                </div>
            </div>
        <!-- End Primer Panel -->
        </div>
    </form>
</div>
@endsection
