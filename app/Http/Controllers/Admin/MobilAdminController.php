<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Mobil;
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
use Datatables;

class MobilAdminController extends Controller
{
    //
    public function index(Request $request){
        if ($request->ajax()) {
            $data = new Collection;
            $mobil = DB::table('mobil')
            ->select('mobil.*',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
            ->where('deleted_at',null)
            ->orderBy('id','desc')
            ->get();
            $no = 1;
            foreach ($mobil as $mobils) {
                if ($mobils->foto_mobil != "") {
                    if (file_exists(storage_path('data/mobil_300_200/'.$mobils->foto_mobil))) {
                        $gambar = '<img class="img-responsive" src="'.asset("storage/data/mobil_300_200/".$mobils->foto_mobil).'" alt="Foto-mobil" style="width: 50px;" />';
                    }else{
                        $gambar = '<img class="img-responsive" src="'.asset("storage/data/mobil/".$mobils->foto_mobil).'" alt="Foto-mobil" style="width: 50px;" />';
                    }
                }else{
                    $gambar = '<img class="img-responsive" src="'.asset("assets/assets/img/car-dummy.jpg").'" alt="Foto-mobil" style="width: 50px;" />';
                }
                $data->push([
                    'no' => $no,
                    'no_pol' => $mobils->no_pol,
                    'merek' => $mobils->merek,
                    'model' => $mobils->model,
                    'harga' => $mobils->harga,
                    'foto' => $gambar,
                    'aksi' => '<div class="btn-group"><button data-toggle="dropdown" class="btn btn-round btn-success dropdown-toggle btn-sm" type="button" aria-expanded="false">Action <span class="caret"></span></button><ul role="menu" class="dropdown-menu"><li><a href="'.url("edit-mobil/".$mobils->id).'">Edit</a></li></li><li> <a href="'.url("hapus-mobil/".$mobils->id).'" onclick="return confirm(\'Hapus Iklan Mobil ?\')">Hapus</a></li></ul></div>',
                ]);
                $no++;
            }
            return Datatables::of($data)->rawColumns(['aksi','foto'])->make(true);
        }
        return view('Admin.mobil.index');
    }

    public function create(){
        $merek = DB::table('merek')
        ->select('merek.*')
        ->where('deleted_at',null)
        ->get();
        $tipe = DB::table('tipe')
        ->select('tipe.*')
        ->where('deleted_at',null)
        ->get();
        $master_jenis = DB::table('tipe')->where('deleted_at',null)->orderBy('id','asc')->pluck('tipe','id');
        $master_merk = DB::table('merek')->where('deleted_at',null)->pluck('merek','id');
        $master_model = DB::table('master_model')->pluck('model','model');
        $master_warna = DB::table('master_warna')->pluck('warna','warna');
        $master_lokasi = DB::table('master_lokasi')->pluck('lokasi','lokasi');
        $master_tahun = DB::table('master_tahun')->orderBy('tahun','asc')->pluck('tahun','tahun');
        return view('Admin.mobil.tambah',compact('merek','tipe','master_jenis','master_merk','master_model','master_lokasi','master_tahun','master_warna'));
    }

    public function store(Request $request){

    	$foto = $request->file('foto-mobil');
        $merek = $request->input('merek');
        $nama_merek_get = DB::table('merek')->where('id',$merek)->first();
        if ($nama_merek_get) {
            $nama_merek = $nama_merek_get->merek;
        }else{
            $nama_merek = '';
        }
        $model = $request->input('model');
        $varian = $request->input('varian');
        $tahun = $request->input('tahun');
        $lokasi = $request->input('lokasi');
        $kondisi = $request->input('kondisi');
        $no_pol = $request->input('no_pol');
        $cakupan_mesin = $request->input('cakupan_mesin');
        $kapasitas = $request->input('kapasitas');
        $tipe = $request->input('tipe');
        $nama_tipe_get = DB::table('tipe')->where('id',$tipe)->first();
        if ($nama_tipe_get) {
            $nama_tipe = $nama_tipe_get->tipe;
        }else{
            $nama_tipe = '';
        }
        $transmisi = $request->input('transmisi');
        $deskripsi = $request->input('deskripsi');
        $kilometer = $request->input('kilometer');
        $warna = $request->input('warna');
        $bahan_bakar = $request->input('bahan_bakar');
        $no_telp = $request->input('no_telp');
        $harga = $request->input('harga');
        $tipe_promo = $request->input('tipe_promo');
        $rekomendasi = $request->input('rekomendasi');
        $hot_deal = $request->input('hot_deal');
        $spesifikasi = $request->input('description');
        $kelengkapan = $request->input('description1');


        $mobil = new Mobil();
        $mobil->id_merek = $merek;
        $mobil->id_tipe = $tipe;
        $mobil->merek = $nama_merek;
        $mobil->tipe = $nama_tipe;
        $mobil->transmisi = $transmisi;
        $mobil->model = $model;
        $mobil->varian = $varian;
        $mobil->tahun = $tahun;
        $mobil->lokasi = $lokasi;
        $mobil->no_pol = $no_pol;
        $mobil->cakupan_mesin = $cakupan_mesin;
        $mobil->deskripsi = $deskripsi;
        $mobil->kuota = $kapasitas;
        $mobil->kondisi = $kondisi;
        $mobil->kilometer = $kilometer;
        $mobil->warna = $warna;
        $mobil->bahan_bakar = $bahan_bakar;
        $mobil->no_telp = $no_telp;
        $mobil->harga = $harga;
        $mobil->spesifikasi = $spesifikasi;
        $mobil->kelengkapan = $kelengkapan;
        $mobil->rekomendasi = $rekomendasi;
        $mobil->hot_deal = $hot_deal;
        
        if($tipe_promo != ""){
            $mobil->tipe_promo = $tipe_promo;    
        }

        if ($merek != "") {
            $mobil->id_merek = $merek;
            $mobil->merek = $nama_merek;
        }
        if ($tipe != "") {

            $mobil->id_tipe = $tipe;
            $mobil->tipe = $nama_tipe;
        }
        if($foto != ""){
            $file_name = Carbon::now()->timestamp ."_mobil_".$nama_merek."_".$nama_tipe.".". $foto->getClientOriginalExtension();
            $filePath = 'storage/data/mobil/';
            $mobil->foto_mobil = $file_name;
            //resize image
            $filePathResize = 'storage/data/mobil_300_200/';
            $filePathResize2 = 'storage/data/mobil_600_400/';
            $img = Image::make($foto);
            $img->resize(800, 1600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filePathResize2. '/' . $file_name);
            $img->resize(340, 880, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filePathResize. '/' . $file_name);

            $foto->move($filePath,$file_name);
        }
        if ($mobil->save()) {
            if($request->hasfile('galeri'))
             {
                foreach($request->file('galeri') as $image)
                {
                    $name = "";
                    $name= $mobil->id.'_'.$image->getClientOriginalName(); 
                    $foto_galeri = new GaleriMobil();
                    $foto_galeri->id_mobil = $mobil->id;
                    $foto_galeri->foto = $name;
                    $foto_galeri->save();  
                    //resize image
                    $filePathResize = 'storage/data/galeri_mobil_600_400/';
                    $img = Image::make($image);
                    $img->resize(800, 1600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($filePathResize. '/' . $name);

                    $image->move('storage/data/galeri_mobil/', $name); 
                }
             }
            return Redirect::to('data-mobil')->with('msg','berhasil');
        }else{
            return Redirect::to('data-mobil')->with('msg','gagal');
        }

    }

    public function edit($id){

    	
        $merek = DB::table('merek')
        ->select('merek.*')
        ->where('deleted_at',null)
        ->get();
        $mobil = DB::table('mobil')
        ->select('mobil.*')
        ->where('id',$id)
        ->first();
        $tipe = DB::table('tipe')
        ->select('tipe.*')
        ->where('deleted_at',null)
        ->get();
        $galeri = DB::table('galeri_mobil')
        ->where('id_mobil',$mobil->id)
        ->get();
        $master_jenis = DB::table('tipe')->where('deleted_at',null)->orderBy('id','asc')->pluck('tipe','id');
        $master_merk = DB::table('merek')->where('deleted_at',null)->pluck('merek','id');
        $master_model = DB::table('master_model')->pluck('model','model');
        $master_warna = DB::table('master_warna')->pluck('warna','warna');
        $master_lokasi = DB::table('master_lokasi')->pluck('lokasi','lokasi');
        $master_tahun = DB::table('master_tahun')->pluck('tahun','tahun');

        return view::make('Admin.mobil.edit',compact('mobil','merek','tipe','master_jenis','master_merk','master_model','master_lokasi','master_tahun','galeri','master_warna'));
    }
    public function show($id){

        $mobil = DB::table('mobil')
        ->select('mobil.*')
        ->where('id',$id)
        ->get();

        return view::make('Admin.mobil.detail',compact('mobil'));
    }

    public function update(Request $request,$id){
    	$foto = $request->file('foto-mobil');
        $merek = $request->input('merek');
        $nama_merek_get = DB::table('merek')->where('id',$merek)->first();
        if ($nama_merek_get) {
            $nama_merek = $nama_merek_get->merek;
        }else{
            $nama_merek = '';
        }
        $model = $request->input('model');
        $varian = $request->input('varian');
        $tahun = $request->input('tahun');
        $lokasi = $request->input('lokasi');
        $kondisi = $request->input('kondisi');
        $no_pol = $request->input('no_pol');
        $cakupan_mesin = $request->input('cakupan_mesin');
        $kapasitas = $request->input('kapasitas');
        $tipe = $request->input('tipe');
        $nama_tipe_get = DB::table('tipe')->where('id',$tipe)->first();
        if ($nama_tipe_get) {
            $nama_tipe = $nama_tipe_get->tipe;
        }else{
            $nama_tipe = '';
        }
        $transmisi = $request->input('transmisi');
        $deskripsi = $request->input('deskripsi');
        $kilometer = $request->input('kilometer');
        $warna = $request->input('warna');
        $bahan_bakar = $request->input('bahan_bakar');
        $no_telp = $request->input('no_telp');
        $harga = $request->input('harga');
        $tipe_promo = $request->input('tipe_promo');
        $rekomendasi = $request->input('rekomendasi');
        $hot_deal = $request->input('hot_deal');
        $spesifikasi = $request->input('description');
        $kelengkapan = $request->input('description1');


        $mobil = Mobil::find($id);
        $mobil->id_merek = $merek;
        $mobil->id_tipe = $tipe;
        $mobil->merek = $nama_merek;
        $mobil->tipe = $nama_tipe;
        $mobil->transmisi = $transmisi;
        $mobil->model = $model;
        $mobil->varian = $varian;
        $mobil->tahun = $tahun;
        $mobil->lokasi = $lokasi;
        $mobil->no_pol = $no_pol;
        $mobil->cakupan_mesin = $cakupan_mesin;
        $mobil->deskripsi = $deskripsi;
        $mobil->kuota = $kapasitas;
        $mobil->kondisi = $kondisi;
        $mobil->kilometer = $kilometer;
        $mobil->warna = $warna;
        $mobil->bahan_bakar = $bahan_bakar;
        $mobil->no_telp = $no_telp;
        $mobil->harga = $harga;
        $mobil->spesifikasi = $spesifikasi;
        $mobil->kelengkapan = $kelengkapan;
        $mobil->rekomendasi = $rekomendasi;
        $mobil->hot_deal = $hot_deal;
        
        if($tipe_promo != ""){
            $mobil->tipe_promo = $tipe_promo;    
        }

        if ($merek != "") {
            $mobil->id_merek = $merek;
            $mobil->merek = $nama_merek;
        }
        if ($tipe != "") {

            $mobil->id_tipe = $tipe;
            $mobil->tipe = $nama_tipe;
        }
        if($foto != ""){
            $file_name = Carbon::now()->timestamp ."_mobil_".$nama_merek."_".$nama_tipe.".". $foto->getClientOriginalExtension();
            $filePath = 'storage/data/mobil/';
            $filePathResize = 'storage/data/mobil_300_200/';
            $filePathResize2 = 'storage/data/mobil_600_400/';
            $img = Image::make($foto);
            $img->resize(800, 1600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filePathResize2. '/' . $file_name);
            $img->resize(340, 880, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filePathResize. '/' . $file_name);

            $foto->move($filePath,$file_name);
            $mobil->foto_mobil = $file_name;
        }
        if ($mobil->save()) {
            $id_galeri_lama = $request->input('id_galeri');
            $hapus_galeri = GaleriMobil::where('id_mobil',$id)
            ->where(function ($query) use ($id_galeri_lama) {
                if ($id_galeri_lama != "") {
                    $query->whereNotIn('id',$id_galeri_lama);
                }
            })
            ->delete();
            if($request->hasfile('galeri'))
             {
                foreach($request->file('galeri') as $image)
                {
                    $name = "";
                    $name= $mobil->id.'_'.$image->getClientOriginalName();
                    //resize image
                    $filePathResize = 'storage/data/galeri_mobil_600_400/';
                    $img = Image::make($image);
                    $img->resize(800, 1680, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($filePathResize. '/' . $name);

                    $image->move('storage/data/galeri_mobil/', $name);  
                    $foto_galeri = new GaleriMobil();
                    $foto_galeri->id_mobil = $mobil->id;
                    $foto_galeri->foto = $name;
                    $foto_galeri->save();  
                }
             }
            return Redirect::to('data-mobil')->with('msg','berhasil');
        }else{
            return Redirect::to('data-mobil')->with('msg','gagal');
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
            $filePathResize = 'storage/data/mobil_300_200/';
            $filePathResize2 = 'storage/data/mobil_600_200/';
            $img = Image::make($foto);
            $img->resize(800, 1600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filePathResize2. '/' . $file_name);
            $img->resize(340, 880, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filePathResize. '/' . $file_name);
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
    	$mobil = Mobil::find($id);
        $mobil->deleted_at = Carbon::today(); 
        if ($mobil->save()) {
            return Redirect::to('data-mobil')->with('msg','berhasil_hapus');
        }else{
            return Redirect::to('data-mobil')->with('msg','gagal_hapus');
        }
    }

    public function convert(){
        $data = Mobil::where('convert_image',0)
        ->orderBy('id','desc')
        ->get();
        foreach ($data as $key => $datas) {
            $get_file = storage_path('data/mobil/'.$datas->foto_mobil);
            if (file_exists($get_file)) {
                $file = File::get($get_file);
                //resize image
                $filePathResize = 'storage/data/mobil_300_200/';
                $img = Image::make($file);
                $img->resize(340, 880, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($filePathResize. '/' . $datas->foto_mobil);
                if (file_exists(storage_path('data/mobil_300_200/'.$datas->foto_mobil))) {
                    $convert_image = 1;
                }else{
                    $convert_image = 2;
                }
                $update = Mobil::find($datas->id);
                if ($update) {
                    $update->convert_image = $convert_image;
                    $update->save();
                }
            }
        }
    }

    public function convert3(){
        $data = Mobil::where('convert_image',0)
        ->orderBy('id','desc')
        ->get();
        foreach ($data as $key => $datas) {
            $get_file = storage_path('data/mobil/'.$datas->foto_mobil);
            if (file_exists($get_file)) {
                $file = File::get($get_file);
                //resize image
                $filePathResize = 'storage/data/mobil_600_400/';
                $img = Image::make($file);
                $img->resize(800, 1600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($filePathResize. '/' . $datas->foto_mobil);
                if (file_exists(storage_path('data/mobil_600_400/'.$datas->foto_mobil))) {
                    $convert_image = 1;
                }else{
                    $convert_image = 2;
                }
                $update = Mobil::find($datas->id);
                if ($update) {
                    $update->convert_image = $convert_image;
                    $update->save();
                }
            }
        }
    }

    public function convert2(){
        $data = GaleriMobil::where('convert_image',0)
        ->orderBy('id','desc')
        ->get();
        foreach ($data as $key => $datas) {
            $get_file = storage_path('data/galeri_mobil/'.$datas->foto);
            if (file_exists($get_file)) {
                $file = File::get($get_file);
                //resize image
                $filePathResize = 'storage/data/galeri_mobil_600_400/';
                $img = Image::make($file);
                $img->resize(800, 1600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($filePathResize. '/' . $datas->foto);
                if (file_exists(storage_path('data/galeri_mobil_600_400/'.$datas->foto))) {
                    $convert_image = 1;
                }else{
                    $convert_image = 2;
                }
                $update = GaleriMobil::find($datas->id);
                if ($update) {
                    $update->convert_image = $convert_image;
                    $update->save();
                }
            }
        }
    }
}
