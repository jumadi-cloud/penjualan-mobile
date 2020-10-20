<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\WarnaMobil;
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

class WarnaAdminController extends Controller
{
    //
    public function index(){
    	$warna = DB::table('master_warna')
        ->orderBy('id','asc')
        ->get();
        return view('Admin.warna.index',compact('warna'));
    }
    public function create(){
        
        return view('Admin.warna.tambah');
    }

    public function store(Request $request){

    	
        $warna = $request->input('warna');

        $data = new WarnaMobil();
        $data->warna = $warna;
        
        if ($data->save()) {
            return Redirect::to('data-warna')->with('msg','berhasil');
        }else{
            return Redirect::to('data-warna')->with('msg','gagal');
        }

    }

    public function edit($id){

    	
        $model = WarnaMobil::find($id);

        return view::make('Admin.warna.edit',compact('model'));
    }
    

    public function update(Request $request,$id){
    	$warna = $request->input('warna');

        $data =  WarnaMobil::find($id);
        $data->warna = $warna;
        
        if ($data->save()) {
            return Redirect::to('data-warna')->with('msg','berhasil_ubah');
        }else{
            return Redirect::to('data-warna')->with('msg','gagal_ubah');
        }
    }

    public function destroy($id){
    	$data = WarnaMobil::find($id);
        if ($data->delete()) {
            return Redirect::to('data-warna')->with('msg','berhasil_hapus');
        }else{
            return Redirect::to('data-warna')->with('msg','gagal_hapus');
        }
    }
}
