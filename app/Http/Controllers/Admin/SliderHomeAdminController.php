<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Slider;
use Carbon\Carbon;
use Redirect;
use Validator;
use View;
use Image;
use File;
use Mail;
use DB;
use PDF;

class SliderHomeAdminController extends Controller
{
    //
    public function index(){
    	$slider = DB::table('slider_home')
            ->select('slider_home.*')
            ->where('deleted_at',null)
            ->get();
    	return view('Admin.slider.index',compact('slider'));
    }
    public function create(){

    	return view('Admin.slider.tambah');
    }

    public function store(Request $request){
    	$foto = $request->file('foto-slider');

    	$slider = new Slider();
    	if($foto != ""){
    	$file_name = Carbon::now()->timestamp ."_Slider_.". $foto->getClientOriginalExtension();
                $filePath = 'storage/data/slider/';
                $foto->move($filePath,$file_name);
        $slider->foto = $file_name;
    }
        if ($slider->save()) {
        return Redirect::to('slider-home')->with('msg','berhasil');
    }else{
        return Redirect::to('slider-home')->with('msg','gagal');
    }
    
    }

    public function edit($id){
    	$slider = Slider::find($id);
    	return view::make('Admin.slider.edit',compact('slider'));
    }

    public function update(Request $request,$id){
    	$foto = $request->file('foto-slider');

    	$slider = Slider::find($id);
    	if($foto != ""){
    	$file_name = Carbon::now()->timestamp ."_Slider_.". $foto->getClientOriginalExtension();
                $filePath = 'storage/data/slider/';
                $foto->move($filePath,$file_name);
        $slider->foto = $file_name;
    }
        if ($slider->save()) {
        return Redirect::to('slider-home')->with('msg','berhasil_ubah');
    }else{
        return Redirect::to('slider-home')->with('msg','gagal_ubah');
    }

    }
    public function destroy($id){
    	$slider = Slider::find($id);
        $slider->deleted_at = Carbon::today();
        
     if ($slider->save()) {
        return Redirect::to('slider-home')->with('msg','berhasil_hapus');
    }else{
        return Redirect::to('slider-home')->with('msg','gagal_hapus');
    }
    }
}
