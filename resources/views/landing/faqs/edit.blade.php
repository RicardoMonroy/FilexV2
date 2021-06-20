@extends('layouts.app', ['activePage' => 'faqs', 'titlePage' => 'Preguntas frecuentes'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Preguntas Frecuentes</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Banners</a></li> --}}
        {{-- <li class="breadcrumb-item active">File Uploads</li> --}}
    </ol>
    <div class="page-header-actions">
        {{-- <a href="{{ route('faqs.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nueva pregunta
        </a> --}}
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        <a href="{{ route('faqs.index') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i>Regresar
        </a>
    </div>
</div>
<div class="page-content">
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title">Preguntas Frecuentes
            <small>Listado de preguntas y respuestas frecuentes.</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <form action="{{ route('faqs.update', $faq->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <h4 class="sub-header">A partir de una base de conocimiento, crea una pregunta que sea frecuente con su respectiva respuesta.</h4>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Pregunta Frecuente</label>
                            <div class="col-md-10">
                                <input type="text" id="question" name="question" class="form-control" value="{{ $faq->question }}">
                                <span class="help-block">Una pregunta que los usuarios hagan con frecuencia</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Respuesta</label>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <textarea class="ckeditor form-control" name="answer">{{ $faq->answer }}</textarea>
                                </div>
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

@push('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endpush
