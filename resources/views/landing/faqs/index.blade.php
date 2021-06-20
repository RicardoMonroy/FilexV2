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
        <a href="{{ route('faqs.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nueva pregunta
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
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title">FAQ's
            <small>Listado de preguntas y respuestas frecuentes.</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">Pregunra</th>
                                <th class="text-center">Respuesta</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-section">
                            @foreach ($faqs as $faq)
                            <tr>
                                <td class="text-left">{{ $faq->question }}</td>
                                <td class="text-left">{!! $faq->answer !!}</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <div class="col-md-4">
                                            <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round"><i class="icon md-edit" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-icon btn-danger btn-round waves-effect waves-light waves-round">
                                                    <i class="icon md-delete" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
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
@endsection

