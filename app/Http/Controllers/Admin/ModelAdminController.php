<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\ModelMobil;
use App\GaleriMobil;
use Carbon\Carbon;
use Redirect;
use Validator;
use View;
use Image;
use File;
use Mail;
use DB;
use PDF;

class ModelAdminController extends Controller
{
    //
    public function index(){
    	$model = DB::table('master_model')
        ->orderBy('id','asc')
        ->get();
        return view('Admin.model.index',compact('model'));
    }
    public function create(){
        
        return view('Admin.model.tambah');
    }

    public function store(Request $request){

    	
        $Model = $request->input('model');

        $data = new ModelMobil();
        $data->model = $Model;
        
        if ($data->save()) {
            return Redirect::to('data-model')->with('msg','berhasil');
        }else{
            return Redirect::to('data-model')->with('msg','gagal');
        }

    }

    public function edit($id){

    	
        $model = ModelMobil::find($id);

        return view::make('Admin.model.edit',compact('model'));
    }
    

    public function update(Request $request,$id){
    	$Model = $request->input('model');

        $data =  ModelMobil::find($id);
        $data->model = $Model;
        
        if ($data->save()) {
            return Redirect::to('data-model')->with('msg','berhasil_ubah');
        }else{
            return Redirect::to('data-model')->with('msg','gagal_ubah');
        }
    }

    public function destroy($id){
    	$data = ModelMobil::find($id);
        if ($data->delete()) {
            return Redirect::to('data-model')->with('msg','berhasil_hapus');
        }else{
            return Redirect::to('data-model')->with('msg','gagal_hapus');
        }
    }
}
