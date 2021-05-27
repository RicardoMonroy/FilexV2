@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => 'Contratos'])

@section('content')
<div class="page-header">
    <h1 class="page-title">Mis Firmas</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Contratos</a></li>
        <li class="breadcrumb-item active">Firmas</li>
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
    <form action="{{ route('signatures.sign') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
    @csrf
        <!-- Primer Panel -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Contrato: {{ $contract->name }} <br>
                    <small>Para firmar {{ $contract->message}} Por favor selecciona una de las dos modalidades de firma</small><br>
                </h3>
            </div>
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-md-6 col-lg-6">

                        <div class="example-wrap">
                            <div class="nav-tabs-horizontal" data-plugin="tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab" aria-selected="true">eFirma</a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab" aria-selected="false">Firma Filex</a></li>
                                    <li class="dropdown nav-item" role="presentation" style="display: none;">
                                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">Menu </a>
                                        <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" data-toggle="tab" href="#exampleTabsOne" aria-controls="exampleTabsOne" role="tab">Home</a>
                                        <a class="dropdown-item" data-toggle="tab" href="#exampleTabsTwo" aria-controls="exampleTabsTwo" role="tab">Components</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="tab-content pt-20">
                                    {{-- efirma --}}
                                    <div class="tab-pane" id="exampleTabsOne" role="tabpanel">
                                        <div class="example-wrap">
                                            <h4 class="example-title">Archivo .cer</h4>
                                            <div class="form-group">
                                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                    <input type="text" class="form-control" readonly="">
                                                    <span class="input-group-btn">
                                                    <span class="btn btn-success btn-file waves-effect waves-light waves-round">
                                                        <i class="icon md-upload" aria-hidden="true"></i>
                                                        <input type="file" name="cerFile" multiple="">
                                                    </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <h4 class="example-title">Archivo .key</h4>
                                            <div class="form-group">
                                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                    <input type="text" class="form-control" readonly="">
                                                    <span class="input-group-btn">
                                                    <span class="btn btn-primary btn-file waves-effect waves-light waves-round">
                                                        <i class="icon md-upload" aria-hidden="true"></i>
                                                        <input type="file" name="pemKeyFile" multiple="">
                                                    </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="example-wrap">
                                                <h4 class="example-title">Password</h4>
                                                <input type="password" name="passPhrase" class="form-control" id="inputPlaceholder" placeholder="El password del SAT" value=" ">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- firma filex --}}
                                    <div class="tab-pane" id="exampleTabsTwo" role="tabpanel">
                                        <div class="example-wrap">
                                            <p>Para realizar una firma por medio de Firma Filex, necesitamos que confirmes los siguientes datos:</p>
                                            <h4 class="example-title">Nombre</h4>
                                            <div class="form-group">
                                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                    <input type="text" name="name" class="form-control" id="inputPlaceholder" placeholder="Tu nombre" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <h4 class="example-title">Email</h4>
                                            <div class="form-group">
                                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                    <input type="email" name="email" class="form-control" id="inputPlaceholder" placeholder="Correo electrónico" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            <h4 class="example-title">RFC</h4>
                                            <div class="form-group">
                                                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                                                    <input type="text" name="rfc" class="form-control" id="inputPlaceholder" placeholder="Tu RFC..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6">
                        <!-- Example Sidebar -->
                        <div class="example-wrap">
                            <h4 class="example-title">Archivo</h4>
                            <div class="example">
                                <h6 class="example-title">{{ $contract->file->name }}</h6>
                                <input type="hidden" name="contractName" value="{{ $contract->file->name }}">
                                <input type="hidden" name="contractId" value="{{ $contract->file->id }}">

                                <button class="btn btn-primary" data-target="#examplePositionSidebar" data-toggle="modal" type="button">Ver archivo</button>
                                <br><br><br>
                                @if (!$user->handwritten)
                                    <h6 class="example-title">No se ha encontrado una firma</h6>
                                    <a class="btn btn-primary" href="{{ route('hadnwrittens.create') }}">Crear una firma en manuscrito digital</a>
                                @else
                                    <h6 class="example-title">Mi firma</h6>
                                    <img src="{{ asset('storage') }}/{{ $user->handwritten->path }}" alt=""><br>
                                    <a class="btn btn-primary" href="{{ route('hadnwrittens.edit', $user->handwritten->id) }}">¿No te agrada? Actualiza tu firma</a>
                                @endif


                                <!-- Modal -->
                                <div class="modal fade" id="examplePositionSidebar" aria-hidden="true" aria-labelledby="examplePositionSidebar"
                                    role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple modal-sidebar modal-xl" style="max-width: 50%; width:100%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title">archivo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <iframe width="100%" height="500" src="{{ asset('storage') }}/{{ $contract->file->file }}" frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            </div>
                        </div>
                        <h4 class="example-title">¿Todo bien?</h4>
                        <p>Al dar click se va a generar una cadena de caractéres que será tu firma digital, es única para este documento.</p>
                        <button type="submit" class="btn btn-success btn-block" data-dismiss="modal">Siguiente</button>
                        <!-- End Example Sidebar -->
                    </div>
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
{{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> --}}

{{-- <script>
    var canvas = document.getElementById('signature-pad');

    // Adjust canvas coordinate space taking into account pixel ratio,
    // to make it look crisp on mobile devices.
    // This also causes canvas to be cleared.
    function resizeCanvas() {
        // When zoomed out to less than 100%, for some very strange reason,
        // some browsers report devicePixelRatio as less than 1
        // and only part of the canvas is cleared then.
        var ratio =  Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    resizeCanvas();

    var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
    });

    document.getElementById('save-png').addEventListener('click', function () {
    if (signaturePad.isEmpty()) {
        return alert("Please provide a signature first.");
    }

    var data = signaturePad.toDataURL('image/png');
    console.log(data);
    window.open(data);
    });

    document.getElementById('save-jpeg').addEventListener('click', function () {
    if (signaturePad.isEmpty()) {
        return alert("Please provide a signature first.");
    }

    var data = signaturePad.toDataURL('image/jpeg');
    console.log(data);
    window.open(data);
    });

    document.getElementById('save-svg').addEventListener('click', function () {
    if (signaturePad.isEmpty()) {
        return alert("Please provide a signature first.");
    }

    var data = signaturePad.toDataURL('image/svg+xml');
    console.log(data);
    console.log(atob(data.split(',')[1]));
    window.open(data);
    });

    document.getElementById('clear').addEventListener('click', function () {
    signaturePad.clear();
    });

    document.getElementById('draw').addEventListener('click', function () {
    var ctx = canvas.getContext('2d');
    console.log(ctx.globalCompositeOperation);
    ctx.globalCompositeOperation = 'source-over'; // default value
    });

    document.getElementById('erase').addEventListener('click', function () {
    var ctx = canvas.getContext('2d');
    ctx.globalCompositeOperation = 'destination-out';
    });
</script> --}}

{{-- <script type="text/javascript">
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
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);
      pizarraCanvas.addEventListener('touchstart',TouchStart,false);
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);
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
    </script> --}}
@endpush
