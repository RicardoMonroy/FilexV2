@extends('layouts.app', ['activePage' => 'contact', 'titlePage' => 'Datos de contacto'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Datos de Contacto</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('sliders.edit') }}">Contacto</a></li> --}}
        {{-- <li class="breadcrumb-item active">File Uploads</li> --}}
    </ol>
    <div class="page-header-actions">
        {{-- <a href="{{ route('sliders.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo banner
        </a> --}}
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        {{-- <a href="{{ route('sliders.index') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i> Regresar
        </a> --}}
    </div>
</div>
<div class="page-content">
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <h3 class="panel-title">Mis Datos de Contacto
                    <small>Datos para que los clientes puedan ponerse en contacto por la landingpage.</small>
                </h3>
            </div>
        </div>
        <div class="panel-body container-fluid">
            <div class="col-lg-12">
                <form action="{{ route('contact.update', $contact->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-7">
                            <div class="block-title clearfix">
                                <h2 class="pull-left">Datos</h2>
                            </div>
                            <h4 class="sub-header">Datos informativos</h4>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="address">Dirección</label>
                                <div class="col-md-9">
                                    <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address }}">
                                    <span class="help-block">Dirección fiscal (dejar en blanco si se desea que no aparezca nada)</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="addressPhone">Teléfono Oficina</label>
                                <div class="col-md-9">
                                    <input type="text" id="addressPhone" name="addressPhone" class="form-control" value="{{ $contact->addressPhone }}">
                                    <span class="help-block">Teléfono de oficina  (dejar en blanco si se desea que no aparezca nada)</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="addressMovil">Teléfono Movil</label>
                                <div class="col-md-9">
                                    <input type="text" id="addressMovil" name="addressMovil" class="form-control" value="{{ $contact->addressMovil }}">
                                    <span class="help-block">Teléfono movil  (dejar en blanco si se desea que no aparezca nada)</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="emailSupport">Email Soporte</label>
                                <div class="col-md-9">
                                    <input type="text" id="emailSupport" name="emailSupport" class="form-control" value="{{ $contact->emailSupport }}" required>
                                    <span class="help-block">Dirección de correo electrónico para soporte técnico (esta dirección es obligatoria)</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="emailSales">Email Ventas</label>
                                <div class="col-md-9">
                                    <input type="text" id="emailSales" name="emailSales" class="form-control" value="{{ $contact->emailSales }}">
                                    <span class="help-block">Dirección de correo electrónico para ventas  (dejar en blanco si se desea que no aparezca nada)</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="emailContact">Email Contacto</label>
                                <div class="col-md-9">
                                    <input type="text" id="emailContact" name="emailContact" class="form-control" value="{{ $contact->emailContact }}" required>
                                    <span class="help-block">Dirección de correo electrónico para contacto, <strong>en ésta dirección llegarán los mensajes del formulario web</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <!-- Updates Block -->
                            <div class="block">
                                <!-- Updates Title -->
                                <div class="block-title">
                                    <h2> Descripcion</h2>
                                </div>
                                <h4 class="sub-header">Texto de información en la sección</h4>

                                <div class="form-group">
                                    {{-- <label class="col-md-2 control-label" for="paragraph">Infoemación</label> --}}
                                    <div class="col-md-12">
                                        <textarea id="paragraph" name="paragraph" rows="5" class="form-control" placeholder="">{{ $contact->paragraph }}</textarea>
                                        <span class="help-block">Aquí va una gran descripción</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-2">
                                        {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Actualizar</button>
                                    </div>
                                </div>


                            </div>
                            <!-- END Updates Block -->
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
