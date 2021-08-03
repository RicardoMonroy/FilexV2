<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contract;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function index() {

    }

    public function openfile($method, $method1) {
        $list = [];
        $list['directory'] = $method;
        $list['file_name'] = $method1;
        dd($list);
        $firmante = 'Ricardo Monroy';

        return view('pdfeditor.index', compact('list', 'firmante'));
    }

    public function contract($id) {

        $contract = Contract::find($id);
        $arfiloc = explode('/', $contract->file->file);
        $foldrname = $arfiloc[0];
        $file_name = $arfiloc[1];

        $list = []; // Lista con los dos datos que requiere el editor: directorio y nombre del archivo
        $list['directory'] = $foldrname;
        $list['file_name'] = $file_name;

        // dd($list, $contract->file);
        $firmante = $contract->signatures;
        $png = $contract->user->handwritten->path;
        // dd($firmante, $png);



        return view('pdfeditor.index', compact('list', 'contract', 'firmante', 'png'));
    }
}
