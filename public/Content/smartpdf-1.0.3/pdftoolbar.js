var CurrentFunction = "";

function PDFStart() {
    smartpdf.start();
    var self = this;
    self.initUI();
    PDFJS.getDocument(self.data).then(function (pdf) {
        if (pdf.numPages < self.settings.sigPage) {
            console.error('[Error] >> options[sigPage] is invalid, total pages is %d', pdf.numPages);
            return;
        }

        if (self.settings.useLastPage) {
            self.settings.sigPage = pdf.numPages;
            $('#pdf-sign-page').val(self.settings.sigPage);
        }

        const totalPages = pdf.numPages;
        this.pdfPages = [];

        self.renderPdf(pdf, 1, totalPages);
    });
}
function PDFClickFunction(e) {
    var btnFunction = $(e).attr("data-btn-function");
    $(".pdf-toolbar .btn.btn-light").removeClass("active");
    var noActive = $(e).attr("data-noactive");
    if (noActive != "true")
        $(e).addClass("active");
    CurrentFunction = btnFunction;
    switch (btnFunction) {
        case "AddText":
            PDF_AddText();
            break;
        case "AddComment":
            PDF_AddText();
            break;
        case "PenDraw":
            PDF_PenDraw();
            break;
        case "Undo":
            cUndo();
            break;
        case "Redo":
            cRedo();
            break;
        case "Print":
            PrintCanvas();
            break;
        case "AddImage":
            PDF_InsertImage();
            break;
        default:
            $(".pdf-working-area .pdf-page canvas").css("cursor", "pointer");
    }
}
function PDF_InsertImage() {
    $("#fileImageUpload").click();
    $("#fileImageUpload").change(function (e) {
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.onloadend = function (event) {
            var imgSrc = reader.result;
            AddFrameImage(e, imgSrc);
            $("#fileImageUpload").off("change");
            $("#fileImageUpload").val("");
        }
        if (file) {
            reader.readAsDataURL(file);
        }
    });
}
function AddFrameImage(e, srcImg) {
    var header = $(".pdf-header");
    var style = "style='width:300px; position:absolute;left:" + ((window.innerWidth / 2) - 150) + "px;top:" + ($(window).scrollTop() + 120) + "px;'";
    var html = "<div class='pdf-dialog-small pdf-dialog-image' " + style + "> <div class='pdf-dialog-small-header'><button onclick='AddImageToCanvas.apply(this, arguments)' type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close btn-save-to-canvas p-0 pr-1'><i class='fa fa-check' aria-check='true'></i> </button><button type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close p-0 pr-2'> <i class='fa fa-times' aria-hidden='true'></i> </button> </div> <img style='width:100%; height:100%' src='" + srcImg + "' class='pdf-image'/> </div>";
    $(".pdf-working-area .pdf-page").append(html);
    InitTextBoxEvent();
}

function PDF_AddText() {
    $(".pdf-working-area .pdf-page canvas").css("cursor", "crosshair");
}
function PDF_AddComment() {
    $(".pdf-working-area .pdf-page canvas").css("cursor", "crosshair");
}
function PDF_PenDraw() {
    $(".pdf-working-area .pdf-page canvas").css("cursor", "crosshair");

}
function PDFPageClick(e) {
    switch (CurrentFunction) {
        case "AddText":
            AddTextBox(e)
            break;
        case "AddComment":
            AddTextBox(e);
            break;
        case "PenDraw":
            InitDrawEnvent(e.currentTarget);
            break;
    }
}
function PDFPageMouseOver(e) {
    currentPagePDFCanvasHover = e.currentTarget;
    switch (CurrentFunction) {
        case "PenDraw":
            InitDrawEnvent(e.currentTarget);
            break;
    }
}


function AddTextBox(e) {
    var header = $(".pdf-header");
    var cursor = e.currentTarget.style.cursor;
    if (cursor == "crosshair") {
        var parentOffset = $(e.srcElement).offset();
        var style = "style='position:absolute;left:" + (parentOffset.left < 0 ? e.pageX - parentOffset.left : e.pageX) + "px;top:" + (parentOffset.top < 0 ? (e.pageY - parentOffset.top) - header.height() : e.pageY - header.height()) + "px;'";
        var html = "<div class='pdf-dialog-small' " + style + "> <div class='pdf-dialog-small-header'><button onclick='AddTextToCanvas.apply(this, arguments)' type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close btn-save-to-canvas p-0 pr-1 d-none'><i class='fa fa-check' aria-check='true'></i> </button><button type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close p-0 pr-2'> <i class='fa fa-times' aria-hidden='true'></i> </button> </div> <textarea class='pdf-textbox-input'></textarea> </div>";
        $(".pdf-working-area .pdf-page").append(html);
        InitTextBoxEvent();
        $(".pdf-textbox-input").keyup(function () {
            if ($(this).val().length > 0) {
                $(this).parent().children().children(".btn-save-to-canvas").removeClass("d-none");
            }
        })
    }
}
function PrintCanvas() {
    var canvas = document.getElementsByClassName('pdf-canvas-content');
    if (canvas != null && canvas.length > 0) {
        var html = "";
        for (var i = 0; i < canvas.length; i++) {
            var _canvas = canvas[i];
            html += "<br/><img src='" + _canvas.toDataURL('image/jpeg', 5) + "'>"
        }
        var code = '\<!DOCTYPE html><html><head><title>' + documentName+'</title></head><body onload=\'printFunction();\'>' + html + '</body></html>';
        const printWin = window.open('', '', '');
        printWin.document.open();
        printWin.document.write(code);

        printWin.document.addEventListener('load', function () {
            printWin.focus();
            printWin.print();
            printWin.document.close();
            printWin.close();
        }, true);
    }
}
var currentPagePDFCanvasHover;
function AddTextToCanvas(e) {
    var canvas = currentPagePDFCanvasHover;
    cPush(canvas);
    var parentOffset = $(canvas).offset();
    var x = e.pageX - parentOffset.left - 115;
    var y = e.pageY - parentOffset.top + 15;
    var text = $(e.currentTarget).parent().parent().children("textarea.pdf-textbox-input").val()
    drawText(x, y, text, canvas);
    cPush(canvas);
}
function AddImageToCanvas(e) {
    var p = $(e.currentTarget).parent().parent().position();
    var canvas = currentPagePDFCanvasHover;
    cPush(canvas);
    var parentOffset = $(canvas).offset();
    var x = p.left - parentOffset.left - 9.5;
    // var y = p.top - parentOffset.top + 16.5 + 100;
    // debugger
    var src = $(e.currentTarget).parent().parent().children("img.pdf-image").attr("src");
    var width = $(e.currentTarget).parent().parent().children("img.pdf-image").innerWidth();
    var height = $(e.currentTarget).parent().parent().children("img.pdf-image").innerHeight();
    var img = new Image();
    img.src = src;
    var context = canvas.getContext("2d");
    // assign the image to anywhere.
    var page_height = canvas.getAttribute("height");
    var page_calcu = Math.floor(p.top / page_height);
    if(page_calcu >= 1) {
        p.top -= (page_calcu * page_height);
    }
    context.drawImage(img, x, p.top, width, height);
    cPush(canvas);
}
function AddSignatureToCanvas(e) {
    var p = $(e.currentTarget).parent().parent().position();
    var canvas = currentPagePDFCanvasHover;
    cPush(canvas);
    var parentOffset = $(canvas).offset();
    var x = p.left - parentOffset.left - 9.5;
    // var y = p.top - parentOffset.top + 16.5;
    // debugger
    var src = $(e.currentTarget).parent().parent().children("img.pdf-signature-image").attr("src");
    var width = $(e.currentTarget).parent().parent().children("img.pdf-signature-image").innerWidth();
    var height = $(e.currentTarget).parent().parent().children("img.pdf-signature-image").innerHeight();
    var img = new Image();
    img.src = src;
    var context = canvas.getContext("2d");
    // assign the image to anywhere.
    var page_height = canvas.getAttribute("height");
    var page_calcu = Math.floor(p.top / page_height);
    if(page_calcu >= 1) {
        p.top -= (page_calcu * page_height);
    }
    console.log(p.left);
    console.log(parentOffset.left);
    context.drawImage(img, x, p.top, width, height);
    cPush(canvas);
}
function InitTextBoxEvent() {
    $(".pdf-dialog-small").draggable({ containment: "parent" }).resizable({
        handles: 's,w,n,e,sw,nw',
        minHeight: 60, minWidth: 30, create: function (event, ui) {
            $('.ui-icon-gripsmall-diagonal-se').remove();
        }
    });
    $(".pdf-dialog-small").mouseover(function () {
        $(this).removeClass("pdf-dialog-small-unfocus");
    });
    $(".pdf-dialog-small .pdf-textbox-input").focusout(function () {
        $(this).parent().addClass("pdf-dialog-small-unfocus");
    });
    $(".pdf-dialog-small").mouseleave(function () {
        if (!$(this).children(".pdf-textbox-input").is(":focus"))
            $(this).addClass("pdf-dialog-small-unfocus");
    });
    $(".pdf-dialog-small-btn-close").click(function () {
        $(this).parent().parent().remove();
    });
}

/////////////////////////////Draw/////////////////////////
var mousePressed = false;
var lastX, lastY;
var cPushArray = new Array();
var cStep = -1;
function AddFrameDraw(e) {
    var cursor = e.currentTarget.style.cursor;
    if (cursor == "crosshair") {
        var parentOffset = $(e.srcElement).offset();
        var style = "style='position:absolute;left:" + (parentOffset.left < 0 ? e.pageX - parentOffset.left : e.pageX) + "px;top:" + (parentOffset.top < 0 ? e.pageY - parentOffset.top : e.pageY) + "px;'";
        var html = "<div class='pdf-dialog-small' " + style + "> <div class='pdf-dialog-small-header'><button onclick='AddTextToCanvas().apply(this, arguments)' type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close btn-save-to-canvas p-0 pr-2 hidden'> <i class='fa fa-check' aria-hidden='true'></i> </button> <button type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close p-0 pr-2'> <i class='fa fa-times' aria-hidden='true'></i> </button> </div> <textarea class='pdf-textbox-input'></textarea> </div>";
        $(".pdf-working-area .pdf-page").append(html);
        InitTextBoxEvent();
    }
}

function cPush(elementCanvas) {
    cStep++;
    currentElementCanvas = elementCanvas;
    if (cStep < cPushArray.length) { cPushArray.length = cStep; }
    var lastPush = cPushArray[cPushArray.length];
    var currentPush = { elementCanvas: elementCanvas, data: elementCanvas.toDataURL() };
    if (lastPush == undefined || (lastPush != undefined && lastPush.data != currentPush.data))
        cPushArray.push(currentPush);
}
function cUndo() {
    if (cStep > -1) {
        var obj = cPushArray[cStep];
        var ctx = obj.elementCanvas.getContext("2d");
        var canvasPic = new Image();
        canvasPic.src = obj.data;
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
        cStep--;
    }
}
function cRedo() {
    if (cStep < cPushArray.length - 1) {
        cStep++;
        var obj = cPushArray[cStep];
        var ctx = obj.elementCanvas.getContext("2d");
        var canvasPic = new Image();
        canvasPic.src = obj.data;
        canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); }
    }
}
function InitDrawEnvent(canvas, isInModal) {
    $(canvas).mousedown(function (e) {
        mousePressed = true;
        var x = isInModal ? e.pageX - $(this).offset().left : e.pageX - $(this).offset().left;
        var y = isInModal ? e.pageY - $(this).offset().top : e.pageY - $(this).offset().top;
        Draw(x, y, false, e.target, !isInModal);
    });

    $(canvas).mousemove(function (e) {
        if (mousePressed) {
            var x = isInModal ? e.pageX - $(this).offset().left : e.pageX - $(this).offset().left;
            var y = isInModal ? e.pageY - $(this).offset().top : e.pageY - $(this).offset().top;
            Draw(x, y, true, e.target, !isInModal);
        }
    });

    $(canvas).mouseup(function (e) {
        mousePressed = false;
    });
    $(canvas).mouseleave(function (e) {
        mousePressed = false;
    });
    $(this).mouseleave(function (e) {
        $(canvas).off();
    })
}
//Hàm vẽ hình vào canvas
function Draw(x, y, isDown, elementCanvas, isPushToHistory) {
    var ctx = elementCanvas.getContext("2d");
    if (isDown) {
        ctx.beginPath();
        ctx.strokeStyle = "#000000";
        ctx.lineWidth = 1.8;
        ctx.lineJoin = "round";
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.closePath();
        ctx.stroke();
        ctx.scale(1, 1);
    }
    else if (isPushToHistory) cPush(elementCanvas);
    lastX = x; lastY = y;
}
//Hàm vẽ Text vào canvas
function drawText(x, y, text, elementCanvas) {
    var ctx = elementCanvas.getContext("2d");
    ctx.font = "14px Arial";
    ctx.fillText(text, x, y);
}

function clearArea(ctx) {
    // Use the identity matrix while clearing the canvas
    ctx.setTransform(1, 0, 0, 1, 0, 0);
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}

//Signature
function PDFCreateSignature(e) {
    var count = $(".pdf-dialog-small.pdf-signature").length;
    if (count > 0) alert("Signature is existed");
    else
        $("#PDFSignatureModal").modal({ backdrop: 'static', keyboard: false }).on('shown.bs.modal', function (e) {

        });
}
function PDFCreateSignature_InitEventCanvas(event) {
    InitDrawEnvent($("#PDFSignatureModal #canvasSignature"), true);
}
function OffEventCanvas(element) {
    $(element).off();
}
function CloseSignatureModal(clsElement) {
    OffEventCanvas($("#PDFSignatureModal #canvasSignature"));
    $("#PDFSignatureModal").modal("hide")
}
function PDFClearSignature() {
    $("#txtFullNameSign").val("");
    var ctx = $("#PDFSignatureModal #canvasSignature")[0].getContext("2d");
    clearArea(ctx);
}
function CanvasToImgUrl(id) {
    var canvas = document.getElementById(id);
    var dataUrl = canvas.toDataURL("image/svg+xml");
    return dataUrl;
}
function RenderSignFullName() {
    var value = $("#txtFullNameSign").val();
    var canvas = document.getElementById("canvasSignature");
    var parentOffset = $(canvas).offset();
    var x = canvas.height - 30;
    var y = canvas.width / 2;
    var ctx = canvas.getContext("2d");
    clearArea(ctx);
    ctx.font = "35px Arial";
    ctx.textAlign = "center";
    ctx.fillText(value, y, x);
}
function AddSignature(e, srcImg) {
    var header = $(".pdf-header");
    var parentOffset = $(e.srcElement).offset();
    var posX = (parentOffset.left < 0 ? e.pageX - parentOffset.left : e.pageX);
    var posY = (parentOffset.top < 0 ? (e.pageY - parentOffset.top) - header.height() : e.pageY - header.height());
    var data = "data-posX:" + posX + " data-posY:" + posY
    var style = "style='position:absolute;left:" + posX + "px;top:" + posY + "px;'";
    var html = "<div " + data + " class='pdf-dialog-small pdf-signature' " + style + "> <div class='pdf-dialog-small-header'><button onclick='AddSignatureToCanvas.apply(this, arguments)' type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close btn-save-to-canvas p-0 pr-1'><i class='fa fa-check' aria-check='true'></i> </button><button type='button' class='btn btn-link btn-sm float-right pdf-dialog-small-btn-close p-0 pr-2'> <i class='fa fa-times' aria-hidden='true'></i> </button> </div> <img src='" + srcImg + "' class='pdf-signature-image'/> </div>";
    $(".pdf-working-area .pdf-page").append(html);
    InitTextBoxEvent();

}
//Hàm gen ra dialog signature
function PDFGenarateSmallDialogSignature(event) {
    $("#PDFSignatureModal").modal("hide");
    var srcImg = CanvasToImgUrl("canvasSignature");
    AddSignature(event, srcImg);
    var canvas = document.getElementById("canvasSignature");
    var ctx = canvas.getContext("2d");
    clearArea(ctx);
}
function GetAllPDFContent() {
    var content = "";
    var doc = new jsPDF('p', 'pt', 'a4');
    var ltContentCanvas = $(".pdf-canvas-content");
    if (ltContentCanvas != undefined && ltContentCanvas.length > 0) {
        for (var i = 0; i < ltContentCanvas.length; i++) {
            var wid;
            var hgt;
            var canvas = ltContentCanvas[i];
            var img = canvas.toDataURL("image/JPEG", wid = canvas.width, hgt = canvas.height);
            var hratio = hgt / wid;
            var width = doc.internal.pageSize.width;
            var height = width * hratio
            doc.addPage(width, height);
            doc.addImage(img, 'JPEG', 0, 0, width, height);
        }
        doc.deletePage(1);
        content = doc.output('datauristring');
        //doc.save();
    }
    return content.split(',')[1];
}
