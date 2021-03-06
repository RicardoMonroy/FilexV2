@extends('layouts.app', ['activePage' => 'sliders', 'titlePage' => 'Banners'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Banners</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Banners</a></li>
        {{-- <li class="breadcrumb-item active">File Uploads</li> --}}
    </ol>
    <div class="page-header-actions">
        {{-- <a href="{{ route('sliders.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo banner
        </a> --}}
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        <a href="{{ route('sliders.index') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i> Regresar
        </a>
    </div>
</div>
<div class="page-content">
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <h3 class="panel-title">Mis Banners
                    <small>Los banners son las fotos con los textos en la pantalla principal.</small>
                </h3>
            </div>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="block">
                                <h2 class="pull-left">Datos</h2>

                                <h4 class="sub-header">Textos informativos</h4>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="title">T??tulo</label>
                                    <div class="col-md-10">
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $slider->title }}" disabled>
                                        <span class="help-block">??ste es el t??tulo que aparece en el banner</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="subtitle">Subt??tulo</label>
                                    <div class="col-md-10">
                                        <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ $slider->subtitle }}" disabled>
                                        <span class="help-block">??ste es el subt??tulo que aparece en el banner</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="paragraph">P??rrafo</label>
                                    <div class="col-md-10">
                                        <textarea id="paragraph" name="paragraph" rows="4" class="form-control" placeholder="" disabled>{{ $slider->paragraph }}</textarea>
                                        <span class="help-block">El p??rafo, aqu?? va una gran descripci??n</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="margin">Margen</label>
                                    <div class="col-md-10">
                                        <input type="text" id="margin" name="margin" class="form-control" value="{{ $slider->margin }}" disabled>
                                        <span class="help-block">??ste es el margen en que aparecen los textos</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                                        <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round"><i class="icon md-edit" aria-hidden="true"></i> Editar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END Twitter Block -->
                        </div>
                        <!-- END First Column -->
                        <!-- Second Column -->
                        <div class="col-md-6">
                            <!-- Updates Block -->
                            <div class="block">
                                <!-- Updates Title -->
                                <div class="block-title">
                                    <h2><i class="fa fa-paper-plane"></a></i> Portada</h2>
                                </div>
                                <h4 class="sub-header">Banner de fondo</h4>

                                <img width="100%" src="{{ asset('storage') }}/{{ $slider->banner }}">
                                {{-- <h4 class="sub-header">Actualizar im??gen </h4> <h5>Se recomienda uma i??gen de 1920 x 1080</h5>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="banner">File input</label>
                                    <div class="col-md-5">
                                        <input type="file" id="banner" name="banner">
                                    </div>
                                </div> --}}
                                <br><br>
                                <h4 class="sub-header"> </h4>

                            </div>
                            <!-- END Updates Block -->
                        </div>

                        <!-- END Second Column -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
