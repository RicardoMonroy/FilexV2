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
                    <h5>Mis contratos</h5>
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <div class="block">
                                <h2 class="pull-left">Datos</h2>
                                <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <h4 class="sub-header">Textos informativos</h4>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="title">Título</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title" name="title" class="form-control" value="" required>
                                            <span class="help-block">Éste es el título que aparece en el banner</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="subtitle">Subtítulo</label>
                                        <div class="col-md-10">
                                            <input type="text" id="subtitle" name="subtitle" class="form-control" value="" required>
                                            <span class="help-block">Éste es el subtítulo que aparece en el banner</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="paragraph">Párrafo</label>
                                        <div class="col-md-10">
                                            <textarea id="paragraph" name="paragraph" rows="4" class="form-control" placeholder="" required></textarea>
                                            <span class="help-block">El párafo, aquí va una gran descripción</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="margin">Margen</label>
                                        <div class="col-md-10">
                                        <select id="margin" name="margin" class="form-control" size="1" required>
                                        <option value="center">Centrado</option>
                                        <option value="left">Izquierda</option>
                                        <option value="right">Derecha</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
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

                                    {{-- <img width="100%" src="{{ asset('storage') }}/{{ $slider->banner }}"> --}}
                                    <h5>Se recomienda uma iágen de 1920 x 1080</h5>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="banner">File input</label>
                                        <div class="col-md-5">
                                            <input type="file" id="banner" name="banner" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h4 class="sub-header"> </h4>
                                </form>

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
