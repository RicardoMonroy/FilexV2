<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    private $doc_ext = ['pdf', 'PDF'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 100; // para aumentar el tamaño máximo de lo que permite PHP
        $all_ext = implode(',', $this->allExtensions());
        $hoy = date("Y-m-d H:i:s");

        $this->validate(request(), [
            'file' => 'required|file|mimes:'.$all_ext.'|max:'.$max_size
        ]);

        $uploadFile = new File();

        $file = $request->file('file');
        $name = str_replace(' ','-', $hoy.'-'.$file->getClientOriginalName());
        $path = $this->getUserFolder() .'/' . $name;
        // dd($path);
        if( Storage::putFileAs('/public/' . $this->getUserFolder() . '/', $file, $name )){
            $uploadFile::create([
                'name' => $name,
                'file' => $path,
                'user_id' => Auth::id(),
            ]);
        }
        return redirect()->route('home')->with('message','Archivo subido con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('delete');
        $file = File::findOrFail($id);
        //dd(Storage::files($this->getUserFolder().'/', $file->file));
        //dd($file->file, Storage::disk('public')->exists($this->getUserFolder().'/', $file->name));


        if(Storage::disk('public')->exists($this->getUserFolder().'/', $file->file))
        {
            // Storage::delete('/public/' . $this->getUserFolder().'/', $file->file);
            Storage::disk('public')->delete($this->getUserFolder().'/', $file->file);
            $file->delete();
            Toastr::warning('Ya no lo veremos por aqui.','Archivo borrado');
            return redirect()->route('files.index');
        }
        else
        {
            dd('no encontrado');
            Toastr::warning('Lo lamentamos, no sabemos que pasó.','Algo salió mal');
            return redirect()->route('files.index');
        }
    }



    private function allExtensions()
    {
        return array_merge($this->doc_ext);
    }

    private function getUserFolder()
    {
        return str_replace(' ', '-', Auth::id() . '-' . Auth::user()->name);
    }
}
