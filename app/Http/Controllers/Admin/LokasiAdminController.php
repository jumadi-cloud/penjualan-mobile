<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Lokasi;
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

class LokasiAdminController extends Controller
{
    //
    public function index(){
    	$lokasi = DB::table('master_lokasi')
        ->orderBy('id','asc')
        ->get();
        return view('Admin.lokasi.index',compact('lokasi'));
    }
    public function create(){
        
        return view('Admin.lokasi.tambah');
    }

    public function store(Request $request){

    	
        $lokasi = $request->input('lokasi');

        $data = new Lokasi();
        $data->lokasi = $lokasi;
        
        if ($data->save()) {
            return Redirect::to('data-lokasi')->with('msg','berhasil');
        }else{
            return Redirect::to('data-lokasi')->with('msg','gagal');
        }

    }

    public function edit($id){

    	
        $lokasi = Lokasi::find($id);

        return view::make('Admin.lokasi.edit',compact('lokasi'));
    }
    

    public function update(Request $request,$id){
    	$lokasi = $request->input('lokasi');

        $data =  Lokasi::find($id);
        $data->lokasi = $lokasi;
        
        if ($data->save()) {
            return Redirect::to('data-lokasi')->with('msg','berhasil_ubah');
        }else{
            return Redirect::to('data-lokasi')->with('msg','gagal_ubah');
        }
    }

    public function destroy($id){
    	$data = Lokasi::find($id);
        if ($data->delete()) {
            return Redirect::to('data-lokasi')->with('msg','berhasil_hapus');
        }else{
            return Redirect::to('data-lokasi')->with('msg','gagal_hapus');
        }
    }
}
