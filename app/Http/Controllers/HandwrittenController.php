<?php

namespace App\Http\Controllers;

use App\Handwritten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HandwrittenController extends Controller
{
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
        return view('hadnwrittens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadFile = new Handwritten();
        // dd($request->all());
        // Obtener los datos de la imagen
        $img = $this->getB64Image($request->imagen);
        $base64_str = substr($request->imagen, strpos($request->imagen, ",")+1);

        // Obtener la extensión de la Imagen
        $img_extension = $this->getB64Extension($request->imagen);
        // Crear un nombre aleatorio para la imagen
        $img_name = 'firma'. time() . '.' . $img_extension;
        // Usando el Storage guardar en el disco creado anteriormente y pasandole a
        // la función "put" el nombre de la imagen y los datos de la imagen como
        // segundo parametro

        if( Storage::disk('public')->put($this->getUserFolder() . '/' . $img_name, $img) ){
            $uploadFile::create([
                'user_id' => Auth::user()->id,
                'path' => $this->getUserFolder() . '/' . $img_name, $img,
                'base64' => $base64_str
            ]);
        }
        return redirect()->route('home')->with('message','Firma guardada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $handwritten = Handwritten::find($id);

        return view('hadnwrittens.edit', compact('handwritten'));
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
        $uploadFile = Handwritten::find($id);

        // dd($request->all());
        // Obtener los datos de la imagen
        $img = $this->getB64Image($request->imagen);
        $base64_str = substr($request->imagen, strpos($request->imagen, ",")+1);

        // Obtener la extensión de la Imagen
        $img_extension = $this->getB64Extension($request->imagen);
        // Crear un nombre aleatorio para la imagen
        $img_name = 'firma'. time() . '.' . $img_extension;
        // Usando el Storage guardar en el disco creado anteriormente y pasandole a
        // la función "put" el nombre de la imagen y los datos de la imagen como
        // segundo parametro
        Storage::delete($uploadFile->path);

        if( Storage::disk('public')->put($this->getUserFolder() . '/' . $img_name, $img) ){
            $uploadFile->path = $this->getUserFolder() . '/' . $img_name;
            $uploadFile->base64 = $base64_str;
            $uploadFile->update();
        }
        return redirect()->route('home')->with('message','Firma guardada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getUserFolder()
    {
        return str_replace(' ', '-', Auth::id() . '-' . Auth::user()->name);
    }

    public function getB64Image($base64_image){
        // Obtener el String base-64 de los datos
        $image_service_str = substr($base64_image, strpos($base64_image, ",")+1);
        // Decodificar ese string y devolver los datos de la imagen
        $image = base64_decode($image_service_str);
        // Retornamos el string decodificado
        return $image;
   }

    public function getB64Extension($base64_image, $full=null){
        // Obtener mediante una expresión regular la extensión imagen y guardarla
        // en la variable "img_extension"
        preg_match("/^data:image\/(.*);base64/i",$base64_image, $img_extension);
        // Dependiendo si se pide la extensión completa o no retornar el arreglo con
        // los datos de la extensión en la posición 0 - 1
        return ($full) ?  $img_extension[0] : $img_extension[1];
    }
}
