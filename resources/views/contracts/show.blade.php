@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => 'Contratos'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Contratos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contratos</a></li>
        <li class="breadcrumb-item active">Ver contrato</li>
    </ol>
    <div class="page-header-actions">
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo
        </a> --}}
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        <a href="{{ route('contracts.index') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i>Regresar
        </a>
    </div>
</div>
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-shadow text-center">
                <div class="card-block">
                    <a class="avatar avatar-lg" href="javascript:void(0)">
                        <img src="{{ asset('backend/img/Avatar.png') }}" alt="...">
                    </a>
                    <h4 class="profile-user">{{ $contract->name }}</h4>
                    <p class="profile-job">{{ $contract->user->name }}</p>
                    <p>{{ $contract->message }}</p>
                </div>
            </div>
        <!-- End Page Widget -->
        </div>

        <div class="col-lg-9">
        <!-- Panel -->
        <div class="panel">
            <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#firmas" aria-controls="firmas" role="tab">Firmas <span class="badge badge-pill badge-danger">{{ $contract->signatures->count() }}</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#firmantes" aria-controls="firmantes" role="tab">Firmantes <span class="badge badge-pill badge-danger">{{ $guests->count() }}</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#documento" aria-controls="documento" role="tab">Documento</a></li>
                    <li class="nav-item dropdown" style="display: none;">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">Menu </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" data-toggle="tab" href="#firmas" aria-controls="firmas" role="tab">Firmas <span class="badge badge-pill badge-danger">{{ $contract->signatures->count() }}</span></a>
                            <a class="dropdown-item" data-toggle="tab" href="#firmantes" aria-controls="firmantes" role="tab">Firmantes <span class="badge badge-pill badge-danger">{{ $guests->count() }}</span></a>
                            <a class="dropdown-item" data-toggle="tab" href="#documento" aria-controls="documento" role="tab">Documento</a>
                        </div>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active animation-slide-left" id="firmas" role="tabpanel">
                        <ul class="list-group">
                            @foreach ($contract->signatures as $sign)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="pr-20">
                                            <a class="avatar" href="javascript:void(0)">
                                                <img class="img-fluid" src="{{ asset('backend/img/Avatar.png') }}" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-5">{{ $sign->user->name }}
                                                <small>{{ $sign->user->email }}</small>
                                            </h5>
                                            <small>Detalles de la firma</small>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <div style="margin-bottom: 20px;">
                                                        <h4 class="example-title">Nombre legal</h4>
                                                        <input type="text" class="form-control" id="inputDisabled" value="{{ $sign->legalName }}" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <div style="margin-bottom: 20px;">
                                                    <h4 class="example-title">RFC</h4>
                                                    <input type="text" class="form-control" id="inputDisabled" value="{{ $sign->rfc }}" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-6">
                                                    <div style="margin-bottom: 20px;">
                                                    <h4 class="example-title">Firmado el</h4>
                                                    <input type="text" class="form-control" id="inputDisabled" value="{{ $sign->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a') }}" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <div style="margin-bottom: 20px;">
                                                        <h4 class="example-title">No. de Serie SCD</h4>
                                                        <input type="text" class="form-control" id="inputDisabled" value="{{ $sign->serialNumber }}" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="example-wrap">
                                                        <h4 class="example-title">firma electrónica</h4>
                                                        <textarea class="form-control" id="textareaDefault" rows="5" disabled="">{{ $sign->string }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane animation-slide-left" id="firmantes" role="tabpanel">
                        <ul class="list-group">
                            @foreach ($guests as $guest)
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="pr-20">
                                            <a class="avatar" href="javascript:void(0)">
                                                <img class="img-fluid" src="{{ asset('backend/img/Avatar.png') }}" alt="...">
                                            </a>
                                        </div>
                                            <div class="media-body">
                                            <h5 class="mt-0 mb-5">{{ $guest->email }}
                                                <small> </small>
                                            </h5>
                                            <small>Invitado el</small>
                                            <div class="profile-brief">{{ isset($sign) ? $sign->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a') : 'Todavía no firma...' }}</div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane animation-slide-left" id="documento" role="tabpanel">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="media">
                                    {{-- <div class="pr-20">
                                    <a class="avatar" href="javascript:void(0)">
                                        <img class="img-fluid" src="../../../global/portraits/2.jpg" alt="...">
                                    </a>
                                    </div> --}}
                                    <div class="media-body">
                                    <h5 class="mt-0 mb-5">Nombre: {{ $contract->file->name }} <br>
                                        <small>Autor: {{ $contract->file->user->name }}</small>
                                    </h5>
                                    <small>A continuación tu documento:</small>
                                        @php
                                            // $arfiloc = explode('/', $file->file);
                                            // $foldrname = $arfiloc[0];
                                            // $file_name = $arfiloc[1];
                                        @endphp

                                        <a href="{{ route('pdfeditor', [ 'id' => $contract->id ]) }}" type="button" class="btn btn-icon btn-danger btn-round waves-effect waves-light waves-round"><i class="icon md-file-plus" aria-hidden="true"></i></a>

                                    @if ( $ready )
                                        {{-- <div class="profile-brief">Ya firmaron todos </div>
                                        <form action="{{ route('signature.generate') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="ContractId" value="{{ $contract->id }}">
                                            <button type="submit">Generar PDF</button>
                                        </form> --}}
                                        <embed src="{{ asset('storage') }}/{{ $contract->signed->url }}" type="application/pdf" width="100%" height="600px" />
                                    @else
                                        <div class="profile-brief">
                                            El documento se genera, una vez que todos los particiántes firmen, o bien puedes generar el documento (toma en cuenta que una vez generado el documento, se imprime el sello de la NOM-151):
                                            <form action="{{ route('signature.generate') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="contractId" value="{{ $contract->id }}">
                                                <button type="submit" class="btn btn-primary">Generar PDF</button>
                                            </form>
                                        </div>
                                    @endif

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Panel -->
        </div>
    </div>
</div>
@endsection
