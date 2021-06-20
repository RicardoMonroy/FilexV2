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
        <a href="{{ route('document.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo documento
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
        <h3 class="panel-title">Documentos
            <small>Listado de documentos que aparecen en la seccipon de Nosotros en la landingpage.</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">Documento</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-section">
                            @foreach ($documents as $document)
                            <tr>
                                <td class="text-center">{{ $document->name }}</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <div class="col-md-4">
                                            <a href="{{ route('document.edit', $document->id) }}" class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round"><i class="icon md-edit" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{ route('document.destroy',$document->id) }}" method="POST">
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
