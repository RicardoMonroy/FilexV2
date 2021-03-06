<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('landing.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider;

        $file = $request->file('banner');
        $name = str_replace(' ','-', $file->getClientOriginalName());
        $path = 'Sliders/' . $name;
        if( Storage::putFileAs('/public/' . 'Sliders/', $file, $name )){
            $slider::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'paragraph' => $request->paragraph,
                'banner' => $path,
            ]);
        }

        return redirect()->route('sliders.index')->with('message','Se añadió un nuevo slide');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);

        return view('landing.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('landing.sliders.edit', compact('slider'));
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
        $slider = Slider::find($id);
        $slider->update($request->all());

        if( $request->banner ){
            $file = $request->file('banner');
            $name = str_replace(' ','-', $file->getClientOriginalName());
            $path = 'Sliders/' . $name;
            Storage::putFileAs('/public/' . 'Sliders/', $file, $name );
            $slider::whereId($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'paragraph' => $request->paragraph,
                'banner' => $path,
            ]);
        }

        return redirect()->route('sliders.index')->with('message','Se actualizó el slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->delete();

        return redirect()->route('sliders.index')->with('message','Slide borrado');
    }
}
