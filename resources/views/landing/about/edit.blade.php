@extends('layouts.app', ['activePage' => 'about', 'titlePage' => 'Sobre Nosotros'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Sobre Nosotros</h1>
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
                <h3 class="panel-title">Mis Datos de marca
                    <small>Información sobre Filex que el usuario tendrá a su disposición en la landingpage.</small>
                </h3>
            </div>
        </div>
        <div class="panel-body container-fluid">
            <div class="col-lg-12">
                <form action="{{ route('about.update', $about->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-7">
                            <div class="block-title clearfix">
                                <h2 class="pull-left">Datos</h2>
                            </div>
                            <h4 class="sub-header">Textos informativos</h4>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="title">Título</label>
                                <div class="col-md-9">
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $about->title }}">
                                    <span class="help-block">Éste es el título que aparece en la sección de nosotros</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="subtitleLeft">Subtítulo</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" id="subtitleLeft" name="subtitleLeft" class="form-control" value="{{ $about->subtitleLeft }}">
                                        <span class="help-block">La parte izquierda del subtítulo</span>
                                    </div>
                                    <div class="col-md-3">
                                        <select id="" name="" class="form-control" size="1">
                                            @foreach ($documents as $document)
                                                <option value="{{ $document->name }}">{{ $document->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">Todos los documentos que apareceran (para añadir ir dar click <a href="{{ route('document.index') }}" >aquí</a>)</span>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="subtitleRight" name="subtitleRight" class="form-control" value="{{ $about->subtitleRight }}">
                                        <span class="help-block">La parte derecha del subtítulo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="paragraph">Párrafo</label>
                                <div class="col-md-9">
                                    <textarea class="ckeditor form-control" name="paragraph">{{ $about->paragraph }}</textarea>
                                    <span class="help-block">El párafo, aquí va una gran descripción</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-2">
                                    {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Actualizar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <!-- Updates Block -->
                            <div class="block">
                                <!-- Updates Title -->
                                <div class="block-title">
                                    <h2><i class="fa fa-paper-plane"></a></i> Portada</h2>
                                </div>
                                <h4 class="sub-header">Imágen</h4>

                                <img width="100%" src="{{ asset('storage') }}/{{ $about->picture }}">
                                <h4 class="sub-header">Actualizar imágen </h4> <h5>Se recomienda uma iágen de 765 x 554</h5>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="picture">File input</label>
                                    <div class="col-md-5">
                                        <input type="file" id="picture" name="picture">
                                    </div>
                                </div>
                                <br><br>
                                <h4 class="sub-header"> </h4>


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

@push('js')
    <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
