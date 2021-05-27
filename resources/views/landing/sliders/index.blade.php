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
        <a href="{{ route('sliders.create') }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo banner
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
        <h3 class="panel-title">Mis Banners
            <small>Los banners son las fotos con los textos en la pantalla principal.</small>
        </h3>
        </div>
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-lg-12">
                    <h5>Mis contratos</h5>
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    Banner
                                </th>
                                <th class="hidden-sm-down">
                                    Título
                                </th>
                                <th>
                                    Firmas
                                </th>
                                <th class="w-150">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-section" data-plugin="tableSection">
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td class="font-weight-medium" style="max-width: 170px;">
                                        <a href="{{ route('sliders.show', $slider->id) }}"><img src="{{ asset('storage') }}/{{ $slider->banner }}" alt="" style="max-width: 100%;"></a>
                                    </td>
                                    <td class="hidden-sm-down" style="vertical-align:middle;">
                                        {{ $slider->title }}
                                    </td>
                                    <td class="hidden-sm-down" style="vertical-align:middle;">
                                        {{ $slider->subtitle }}
                                    </td>
                                    <td class="text-center" style="vertical-align:middle;">
                                        <div class="btn-group">
                                            <div class="col-md-4">
                                                <form action="{{ route('sliders.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $slider->id }}">
                                                    <input type="hidden" name="type" value="individual">
                                                    <button type="submit"  class="btn btn-icon btn-info btn-round waves-effect waves-light waves-round">
                                                        <i class="icon md-edit" aria-hidden="true"></i>
                                                    </button>
                                                </form>
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
