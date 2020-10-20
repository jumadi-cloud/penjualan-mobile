<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Tahun;
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

class TahunAdminController extends Controller
{
    //
    public function index(){
    	$tahun = DB::table('master_tahun')
        ->orderBy('id','asc')
        ->get();
        return view('Admin.tahun.index',compact('tahun'));
    }
    public function create(){
        
        return view('Admin.tahun.tambah');
    }

    public function store(Request $request){

    	
        $tahun = $request->input('tahun');

        $data = new Tahun();
        $data->tahun = $tahun;
        
        if ($data->save()) {
            return Redirect::to('data-tahun')->with('msg','berhasil');
        }else{
            return Redirect::to('data-tahun')->with('msg','gagal');
        }

    }

    public function edit($id){

    	
        $tahun = Tahun::find($id);

        return view::make('Admin.tahun.edit',compact('tahun'));
    }
    

    public function update(Request $request,$id){
    	$tahun = $request->input('tahun');

        $data =  Tahun::find($id);
        $data->tahun = $tahun;
        
        if ($data->save()) {
            return Redirect::to('data-tahun')->with('msg','berhasil_ubah');
        }else{
            return Redirect::to('data-tahun')->with('msg','gagal_ubah');
        }
    }

    public function createGaleri($id){
        $mobil = DB::table('mobil')
        ->select('mobil.*')
        ->where('id',$id)
        ->get();
        return view::make('Admin.mobil.tambah_galeri',compact('mobil'));
    }

    public function storeGaleri(Request $request,$id){
        $foto = $request->file('foto_galeri');
        $nama_merek = $request->input('merek');
        $nama_tipe = $request->input('tipe');
        $id_mobil = $request->input('id_mobil');

        $foto_galeri = new GaleriMobil();
        if($foto != ""){
            $file_name = Carbon::now()->timestamp ."_mobil_".$nama_merek."_".$nama_tipe.".". $foto->getClientOriginalExtension();
            $filePath = 'storage/data/galeri_mobil/';
            $foto->move($filePath,$file_name);
            
            $foto_galeri->id_mobil = $id_mobil;
            $foto_galeri->foto = $file_name;
        }

        if ($foto_galeri->save()) {
            return Redirect::to('data-mobil')->with('msg','berhasil_foto');
        }else{
            return Redirect::to('data-mobil')->with('msg','gagal_foto');
        }
    }

    public function destroy($id){
    	$data = Tahun::find($id);
        if ($data->delete()) {
            return Redirect::to('data-tahun')->with('msg','berhasil_hapus');
        }else{
            return Redirect::to('data-tahun')->with('msg','gagal_hapus');
        }
    }
}
