@extends('layouts.app', ['activePage' => 'hadnwritten', 'titlePage' => 'Firmas'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Firmas</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Nueva Firma</li>
    </ol>
    <div class="page-header-actions">
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Refresh">
            <i class="icon md-file-plus" aria-hidden="true"></i>Nuevo
        </a> --}}
        {{-- <a type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Edit">
            <i class="icon md-edit" aria-hidden="true"></i>Editar
        </a> --}}
        {{-- <a href="{{ Redirect::back() }}" type="button" class="btn btn-sm btn-icon btn-inverse btn-round" data-toggle="tooltip" data-original-title="Setting">
            <i class="icon md-assignment-return" aria-hidden="true"></i>Regresar
        </a> --}}
    </div>
</div>
<div class="page-content">
    <form action="{{ route('hadnwrittens.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    @csrf
        <!-- Primer Panel -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Firma de: {{ Auth::user()->name }} <br>
                    <small>Manuscrito digitalizado</small><br>
                </h3>
            </div>
            <div class="panel-body container-fluid">

                <h4 class="example-title">Mi firma</h4>
                <div class="example">


                    <canvas id='canvas' width="350" height="200" style='border: 1px solid #CCC;'>
                        <p>Tu navegador no soporta canvas</p>
                    </canvas><br>

                    <input type='hidden' name='imagen' id='imagen' />
                    <button type='button' class="btn btn-primary" onclick='LimpiarTrazado()'>Borrar lienzo</button>
                    <button type='submit' class="btn btn-success" onclick='GuardarTrazado()'>Guardar firma</button>

                </div>
            </div>
        <!-- End Primer Panel -->
        </div>
    </form>
</div>
@endsection

@push('js')
<script type="text/javascript">
    /* Variables de Configuracion */
    var idCanvas='canvas';
    var idForm='formCanvas';
    var inputImagen='imagen';
    var estiloDelCursor='crosshair';
    var colorDelTrazo='#555';
    var colorDeFondo='#fff';
    var grosorDelTrazo=2;

    /* Variables necesarias */
    var contexto=null;
    var valX=0;
    var valY=0;
    var flag=false;
    var imagen=document.getElementById(inputImagen);
    var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
    var altoCanvas=document.getElementById(idCanvas).offsetHeight;
    var pizarraCanvas=document.getElementById(idCanvas);

    /* Esperamos el evento load */
    window.addEventListener('load',IniciarDibujo,false);

    function IniciarDibujo(){
      /* Creamos la pizarra */
      pizarraCanvas.style.cursor=estiloDelCursor;
      contexto=pizarraCanvas.getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
      contexto.strokeStyle=colorDelTrazo;
      contexto.lineWidth=grosorDelTrazo;
      contexto.lineJoin='round';
      contexto.lineCap='round';
      /* Capturamos los diferentes eventos */
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);// Click pc
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);// fin click pc
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc

      pizarraCanvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra
    }

    function MouseDown(e){
      flag=true;
      contexto.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
      contexto.moveTo(valX,valY);
    }

    function MouseUp(e){
      contexto.closePath();
      flag=false;
    }

    function MouseMove(e){
      if(flag){
        contexto.beginPath();
        contexto.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
        contexto.lineTo(valX,valY);
        contexto.closePath();
        contexto.stroke();
      }
    }

    function TouchMove(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) {
        var touch = e.targetTouches[0];
        MouseMove(touch);
      }
    }

    function TouchStart(e){
      if (e.targetTouches.length == 1) {
        var touch = e.targetTouches[0];
        MouseDown(touch);
      }
    }

    function TouchEnd(e){
      if (e.targetTouches.length == 1) {
        var touch = e.targetTouches[0];
        MouseUp(touch);
      }
    }

    function posicionY(obj) {
      var valor = obj.offsetTop;
      if (obj.offsetParent) valor += posicionY(obj.offsetParent);
      return valor;
    }

    function posicionX(obj) {
      var valor = obj.offsetLeft;
      if (obj.offsetParent) valor += posicionX(obj.offsetParent);
      return valor;
    }

    /* Limpiar pizarra */
    function LimpiarTrazado(){
      contexto=document.getElementById(idCanvas).getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
    }

    /* Enviar el trazado */
    function GuardarTrazado(){
      imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
      document.forms[idForm].submit();
    }
 </script>
@endpush
