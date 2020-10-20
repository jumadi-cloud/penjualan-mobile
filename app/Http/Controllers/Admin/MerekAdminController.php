<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Merek;
use Carbon\Carbon;
use Redirect;
use Validator;
use View;
use Image;
use File;
use Mail;
use DB;
use PDF;

class MerekAdminController extends Controller
{
    //
    public function index(){
    	$merek = DB::table('merek')
            ->select('merek.*')
            ->where('deleted_at',null)
            ->get();
    	return view('Admin.merek.index',compact('merek'));
    }
    public function create(){

    	return view('Admin.merek.tambah');
    }

    public function store(Request $request){
    	$foto = $request->file('foto-merek');
        $mereknama = $request->input('merek');

    	$merek = new Merek();
        if($foto != ""){
    	$file_name = Carbon::now()->timestamp ."_merek.". $foto->getClientOriginalExtension();
                $filePath = 'storage/data/merek/';
                $foto->move($filePath,$file_name);
        $merek->merek = $mereknama;
        $merek->foto_merek = $file_name;
    }
        if ($merek->save()) {
        return Redirect::to('data-merek')->with('msg','berhasil');
    }else{
        return Redirect::to('data-merek')->with('msg','gagal');
    }
    
    }

    public function edit($id){
    	$merek = Merek::find($id);
    	return view::make('Admin.merek.edit',compact('merek'));
    }

    public function update(Request $request,$id){
    	$foto = $request->file('foto-merek');
        $mereknama = $request->input('merek');

    	$merek = Merek::find($id);
        if($foto != ""){
    	$file_name = Carbon::now()->timestamp ."_merek_.". $foto->getClientOriginalExtension();
                $filePath = 'storage/data/merek/';
                $foto->move($filePath,$file_name);
         $merek->merek = $mereknama;
        $merek->foto_merek = $file_name;
    }
       if ($merek->save()) {
        return Redirect::to('data-merek')->with('msg','berhasil_ubah');
    }else{
        return Redirect::to('data-merek')->with('msg','gagal_ubah');
    }
    }
    public function destroy($id){
    	$merek = Merek::find($id);
        $merek->deleted_at = Carbon::today(); 
     if ($merek->save()) {
        return Redirect::to('data-merek')->with('msg','berhasil_hapus');
    }else{
        return Redirect::to('data-merek')->with('msg','gagal_hapus');
    }
    }
}
