@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => 'Contratos'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Contratos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contratos</a></li>
        <li class="breadcrumb-item active">Nuevo</li>
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
    <form action="{{ route('contracts.confirm') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    @csrf
        <!-- Primer Panel -->
        <div class="panel">
            <div class="panel-heading">
            <h3 class="panel-title">Contratos:
                <small>creación de un nuevo contrato</small>
            </h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="example-wrap m-sm-0">
                                    <h4 class="example-title">Selecciona un archivo</h4>
                                    <div class="form-group">
                                        <select name="file_id" class="form-control">
                                            @foreach ($files as $file)
                                                <option value="{{ $file->id }}">{{ $file->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6  col-sm-12">
                                <div class="example-wrap">
                                    <h4 class="example-title">Nombre del contrato</h4>
                                    <input type="text" name="name" class="form-control" id="inputPlaceholder" placeholder="Escribe un nombre descriptivo...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- Example Textarea -->
                                <div class="example-wrap">
                                <h4 class="example-title">Describe de que se trata...</h4>
                                <textarea class="form-control" name="message" id="textareaDefault" rows="3"></textarea>
                                </div>
                                <!-- End Example Textarea -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="example-wrap">
                                <h4 class="example-title">Invita a alguien</h4>
                                <input type="email" name="email0" class="form-control" id="inputPlaceholder" placeholder="Con su dirección de correo es suficiente...">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <br>
                                <div class="col-sm-12">
                                    <a class="btn btn-success btn-block waves-effect waves-light waves-round" href="#" onclick="AgregarCampos();">Agregar a alguien más</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div id="campos"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-icon btn-block btn-primary waves-effect waves-light waves-round"><i class="icon md-plus-circle-o" aria-hidden="true"></i> Guardar</button>
                    </div>
                </div>
            </div>
        <!-- End Primer Panel -->
        </div>
    </form>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        var nextinput = 0;
        function AgregarCampos(){
        nextinput++;
        // campo = '<li id="rut'+nextinput+'">Correo:<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; /></li>';
        if(nextinput < 5){
            campo = '<input type="email" id="email' + nextinput + '"&nbsp; name="email' + nextinput + '" class="form-control" placeholder="Ej. usuario@ejemplo.com" /><br>';
        $("#campos").append(campo);
        }
        }
    </script>
@endpush
