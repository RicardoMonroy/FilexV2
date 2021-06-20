@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => 'Documentos'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Documentos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Banners</a></li> --}}
        {{-- <li class="breadcrumb-item active">File Uploads</li> --}}
    </ol>
    <div class="page-header-actions">
        {{-- <a href="{{ route('document.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo documento
        </a> --}}
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        <a href="{{ route('document.index') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i>Regresar
        </a>
    </div>
</div>
<div class="page-content">
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title">Documentos
            <small>Listado de documentos que aparecen en la seccipon de Nosotros en la landingpage.</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <h4 class="sub-header">En esta sección se creaen los tipos de documentos que apareceran en la sección de "Nosotros" en la landingpage.</h4>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Nombre del documento</label>
                            <div class="col-md-10">
                                <input type="text" id="name" name="name" class="form-control" >
                                <span class="help-block">Nombre del tipo de documento</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
