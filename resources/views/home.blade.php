@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => 'Dashboard'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">Forms</a></li>
        <li class="breadcrumb-item active">File Uploads</li> --}}
    </ol>
    <div class="page-header-actions">
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Añadir
        </a>
        <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a>
        <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i>Regresar
        </a> --}}
    </div>
</div>
<div class="page-content">
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title">Filex
            <small>guía rápida para firmar</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-xl-4 col-md-6 text-center">
                    <h4 class="example-title">1.- Selecciona un archivo PDF</h4>
                </div>

                <div class="col-xl-4 col-md-6 text-center">
                    <h4 class="example-title">2.- Subelo a la plataforma</h4>
                </div>

                <div class="col-xl-4 col-md-6 text-center">
                    <h4 class="example-title">3.- Elige que hacer con tu archivo</h4>
                </div>
            </div>
            <form action="{{ route('files.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            @csrf
                <div class="row row-lg">
                    <div class="col-xl-4 col-md-6">
                        <div class="example-wrap">
                            <div class="example">
                            <input type="file" name="file" id="input-file-now" data-plugin="dropify" required data-default-file=""/>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 align-self-center">
                        <div class="example-wrap">
                          <button type="submit" class="btn btn-success btn-block btn-round waves-effect waves-light waves-round"><i class="icon md-cloud-upload" aria-hidden="true"></i>Subir</button>
                        </div>
                    </div>
            </form>
                    <div class="col-xl-4 col-md-12 align-self-center">
                        <!-- Example Default Value -->
                        <div class="example-wrap">
                            @if ( !isset($lastFile) )
                                <h4 class="text-center">Todavía no hay nada por aqui...</h4>
                                <div class="example">
                                    <div class="btn-group btn-group-justified">
                                        <div class="btn-group" role="group">
                                            <button type="submit"  class="btn btn-primary waves-effect waves-light waves-round" disabled>
                                                <i class="icon md-border-color" aria-hidden="true" style="color: white"></i>
                                                <br>
                                                <span class="text-uppercase hidden-sm-down"  style="color: white">Firmar</span>
                                            </button>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-info waves-effect waves-light waves-round" disabled>
                                                <i class="icon md-share" aria-hidden="true"></i>
                                                <br>
                                                <span class="text-uppercase hidden-sm-down">Invitar</span>
                                            </button>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success waves-effect waves-light waves-round" disabled>
                                                <i class="icon md-inbox" aria-hidden="true"></i>
                                                <br>
                                                <span class="text-uppercase hidden-sm-down">Almacenar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h4 class="text-center">{{ isset($lastFile->name) ? $lastFile->name : '' }}</h4>
                                <div class="example">
                                    <div class="btn-group btn-group-justified">
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('contracts.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ isset($lastFile->id) ? $lastFile->id : '' }}">
                                                <input type="hidden" name="type" value="individual">
                                                <button type="submit"  class="btn btn-primary waves-effect waves-light waves-round">
                                                    <i class="icon md-border-color" aria-hidden="true" style="color: white"></i>
                                                    <br>
                                                    <span class="text-uppercase hidden-sm-down"  style="color: white">Firmar</span>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <a type="button" href="{{ route('contracts.create') }}" class="btn btn-info waves-effect waves-light waves-round">
                                                <i class="icon md-share" aria-hidden="true" style="color: white"></i>
                                                <br>
                                                <span class="text-uppercase hidden-sm-down" style="color: white">Invitar</span>
                                            </a>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-success waves-effect waves-light waves-round">
                                                <i class="icon md-inbox" aria-hidden="true"></i>
                                                <br>
                                                <span class="text-uppercase hidden-sm-down">Almacenar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- End Example Default Value -->
                    </div>
                </div>
        </div>
    </div>
    <!-- End Primer Panel -->
    <!-- Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
        <h3 class="panel-title">Archivos
            <small>en un solo lugar</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg ">
                <table class="table table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>
                                Archivo
                            </th>
                            <th class="hidden-sm-down">
                                Contratos
                            </th>
                            <th>
                                Firmas
                            </th>
                            <th class="w-150">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-section" data-plugin="tableSection">
                        @foreach ($files as $file)
                            <tr>
                                <td style="vertical-align:middle;">{{ $file->id }}</td>
                                <td class="font-weight-medium" style="vertical-align:middle;">
                                    {{ $file->name }}
                                </td>
                                <td class="hidden-sm-down" style="vertical-align:middle;">
                                    <ul>
                                        @foreach ($file->contracts as $contract)
                                            <a href="{{ route('contracts.show', $contract->id) }}"><li>{{ $contract->name }}</li></a>
                                        @endforeach
                                    </ul>
                                </td>
                                <td style="vertical-align:middle;">
                                    <ul>
                                        @if ( isset($contract) )
                                            @foreach ($contract->signatures as $signature)
                                                <li>{{ $signature->user->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td class="text-center" style="vertical-align:middle;">
                                    <div class="btn-group">
                                        <div class="col-md-4">
                                            <form action="{{ route('contracts.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $file->id }}">
                                                <input type="hidden" name="type" value="individual">
                                                <button type="submit"  class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round">
                                                    <i class="icon md-edit" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            {{-- <a type="button" href="{{ route('contracts.store', $file) }}" class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round"><i class="icon md-edit" aria-hidden="true"></i></a> --}}
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{ route('contracts.create') }}" type="button" class="btn btn-icon btn-success btn-round waves-effect waves-light waves-round"><i class="icon md-share" aria-hidden="true"></i></a>
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
    <!-- End Primer Panel -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Mis Invitaciones
                <small>aquí aparecerán los contratos a los que fuiste invitado a firmar por otros usuarios.</small>
            </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <h5>Mis contratos</h5>
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>
                                    Contrato
                                </th>
                                <th class="hidden-sm-down">
                                Te invitó
                                </th>
                                <th>
                                    Firmas
                                </th>
                                <th class="w-150">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-section" data-plugin="tableSection">
                            @foreach ($myinvitations as $contract)
                                <tr>
                                    <td style="vertical-align:middle;">{{ $contract->id }}</td>
                                    <td class="font-weight-medium" style="vertical-align:middle;">
                                        <a href="{{ route('contracts.show', $contract->id) }}">{{ $contract->name }}</a>
                                    </td>
                                    <td class="hidden-sm-down" style="vertical-align:middle;">
                                        {{ $contract->user_name }}
                                    </td>
                                    <td style="vertical-align:middle;">
                                        <ul>
                                            @foreach ($contract->signatures as $signature)
                                                <li>{{ $signature->user->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        <div class="btn-group">
                                            <div class="col-md-4">
                                                <form action="{{ route('contracts.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $contract->id }}">
                                                    <input type="hidden" name="type" value="individual">
                                                    <button type="submit"  class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round">
                                                        <i class="icon md-edit" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                {{-- <a type="button" href="{{ route('contracts.store', $contract) }}" class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round"><i class="icon md-edit" aria-hidden="true"></i></a> --}}
                                            </div>
                                            <div class="col-md-4">
                                                <a type="button" class="btn btn-icon btn-success btn-round waves-effect waves-light waves-round"><i class="icon md-share" aria-hidden="true"></i></a>
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
