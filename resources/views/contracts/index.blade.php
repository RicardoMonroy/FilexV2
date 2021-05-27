@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => 'Contratos'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Contratos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contratos</a></li>
        {{-- <li class="breadcrumb-item active">File Uploads</li> --}}
    </ol>
    <div class="page-header-actions">
        <a href="{{ route('contracts.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo contato
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
        <h3 class="panel-title">Mis Contratos
            <small>ordenados en contratos propios, y contratos que enviaste a otros.</small>
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
                                    Invitados
                                </th>
                                <th>
                                    Firmas
                                </th>
                                <th class="w-150">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-section" data-plugin="tableSection">
                            @foreach ($mycontracts as $contract)
                                <tr>
                                    <td style="vertical-align:middle;">{{ $contract->id }}</td>
                                    <td class="font-weight-medium" style="vertical-align:middle;">
                                        <a href="{{ route('contracts.show', $contract->id) }}">{{ $contract->name }}</a>
                                    </td>
                                    <td class="hidden-sm-down" style="vertical-align:middle;">
                                        <ul>
                                            @foreach ($contract->users as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ul>
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
