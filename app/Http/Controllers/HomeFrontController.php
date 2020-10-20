<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Mobil;
use App\MasterPdf;
use Redirect;
use Validator;
use View;
use Image;
use File;
use Mail;
use DB;
use PDF;
use App\Setting;

class HomeFrontController extends Controller
{
    //
    public function index(Request $request){
    	$slider = DB::table('slider_home')
            ->select('slider_home.*')
            ->where('deleted_at',null)
            ->orderBy('slider_home.id','DESC')
            ->get();
        $pdf = DB::table('master_pdfs')
            ->orderBy('id','DESC')
            ->get();
         $merek = DB::table('merek')
            ->select('merek.*')
            ->where('deleted_at',null)
            ->get();
        $lokasi = DB::table('mobil')
            ->select('mobil.lokasi')
            ->where('deleted_at',null)
            ->where('lokasi','!=','')
            ->groupBy('lokasi')
            ->get();
        $model = DB::table('mobil')
            ->select('mobil.model')
            ->where('deleted_at',null)
            ->where('model','!=','')
            ->groupBy('model')
            ->get();
        $tipe = DB::table('mobil')
            ->select('mobil.tipe')
            ->where('deleted_at',null)
            ->where('tipe','!=','')
            ->groupBy('tipe')
            ->get();
         $tahun = DB::table('mobil')
            ->select('mobil.tahun')
            ->where('deleted_at',null)
            ->where('tahun','!=','')
            ->groupBy('tahun')
            ->get();
        $mobil_rekomendasi = DB::table('mobil')
            ->select('mobil.*')
            ->where('deleted_at',null)
            ->where('rekomendasi','ya')
            ->orderBy('id','desc')
            ->get();

        $master_jenis = DB::table('tipe')->where('deleted_at',null)->orderBy('id','asc')->pluck('tipe','tipe');
        $master_merk = DB::table('merek')->where('deleted_at',null)->pluck('merek','merek');
        $master_model = DB::table('master_model')->pluck('model','model');
        $master_lokasi = DB::table('master_lokasi')->pluck('lokasi','lokasi');
        $master_tahun = DB::table('master_tahun')->pluck('tahun','tahun');

    	return view('Frontend.Beranda.index_beranda', compact('slider','merek','mobil_rekomendasi','tahun','lokasi','model','tipe','master_jenis','master_merk','master_model','master_lokasi','master_tahun','pdf'));
    }
    

        


    public function indexFilter(){

        $data_setting = Setting::find(1);
        $tahun = Input::get('tahunFilter');
        $model = Input::get('modelFilter');
        $tipe = Input::get('tipeMobilFilter');
        $lokasi = Input::get('lokasiFilter');
        $merek = Input::get('merekFilter');
        $harga = Input::get('hargaFilter');
        $transmisi = Input::get('transmisiFilter');
        $bahan_bakar = Input::get('bahan_bakarFilter');
        $harga_low = Input::get('filterHargaLow');
        $harga_high = Input::get('filterHargaHigh');
        $search = Input::get('search');
        $mobil_filter = DB::table('mobil')
        ->where('deleted_at',null)
        ->where(function ($query) use ($tahun,$model,$tipe,$lokasi,$merek,$harga,$transmisi,$bahan_bakar,$harga_low,$harga_high,$search) {
            if ($tahun != "") {
                $query->where('tahun',$tahun);
            }
            if ($model != "") {
                $query->where('model',$model);
            }
            if ($tipe != "") {
                $query->where('tipe',$tipe);
            }
            if ($lokasi != "") {
                $query->where('lokasi',$lokasi);
            }
            if ($merek != "") {
                $query->where('merek',$merek);
            }
            if ($harga != "") {
                $query->where('harga',$harga);
            }
            if ($transmisi != "") {
                $query->where('transmisi',$transmisi);
            }
            if ($bahan_bakar != "") {
                $query->where('bahan_bakar',$bahan_bakar);
            }
            if ($harga_low != "") {
                $query->where('harga','>=',$harga_low);
            }
            if ($harga_high != "") {
                $query->where('harga','<=',$harga_high);
            }
            if ($search != "") {
                $query->where('merek', 'LIKE', '%'.$search.'%')
                ->orWhere('no_pol', 'LIKE', '%'.$search.'%')
                ->orWhere('tahun', 'LIKE', '%'.$search.'%')
                ->orWhere('deskripsi', 'LIKE', '%'.$search.'%')
                ->orWhere('lokasi', 'LIKE', '%'.$search.'%')
                ->orWhere('cakupan_mesin', 'LIKE', '%'.$search.'%')
                ->orWhere('kilometer', 'LIKE', '%'.$search.'%')
                ->orWhere('bahan_bakar', 'LIKE', '%'.$search.'%');
            }
        })
        ->orderBy('id','desc')
        ->paginate(7);

        $merek_filter = DB::table('mobil')
            ->select('mobil.merek')
            ->where('deleted_at',null)
            ->where('merek','!=','')
            ->groupBy('merek')
            ->get();
        $lokasi_filter = DB::table('mobil')
            ->select('mobil.lokasi')
            ->where('deleted_at',null)
            ->where('lokasi','!=','')
            ->groupBy('lokasi')
            ->get();
        $harga_filter = DB::table('mobil')
            ->select('mobil.harga')
            ->where('deleted_at',null)
            ->where('harga','!=','')
            ->groupBy('harga')
            ->get();
        $tipe_filter = DB::table('mobil')
            ->select('mobil.tipe')
            ->where('deleted_at',null)
            ->where('tipe','!=','')
            ->groupBy('tipe')
            ->get();
         $tahun_filter = DB::table('mobil')
            ->select('mobil.tahun')
            ->where('deleted_at',null)
            ->where('tahun','!=','')
            ->groupBy('tahun')
            ->get();
        $kondisi_filter = DB::table('mobil')
            ->select('mobil.kondisi')
            ->where('deleted_at',null)
            ->where('kondisi','!=','')
            ->groupBy('kondisi')
            ->get();
        $transmisi_filter = DB::table('mobil')
            ->select('mobil.transmisi')
            ->where('deleted_at',null)
            ->where('transmisi','!=','')
            ->groupBy('transmisi')
            ->get();
        $bahan_bakar_filter = DB::table('mobil')
            ->select('mobil.bahan_bakar')
            ->where('deleted_at',null)
            ->where('bahan_bakar','!=','')
            ->groupBy('bahan_bakar')
            ->get();

        $master_jenis = DB::table('tipe')->where('deleted_at',null)->orderBy('id','asc')->pluck('tipe','tipe');
        $master_merk = DB::table('merek')->where('deleted_at',null)->pluck('merek','merek');
        $master_model = DB::table('master_model')->pluck('model','model');
        $master_lokasi = DB::table('master_lokasi')->pluck('lokasi','lokasi');
        $master_tahun = DB::table('master_tahun')->pluck('tahun','tahun');

        return view::make('Frontend.List.List_filter',compact('merek_filter','lokasi_filter','harga_filter','tipe_filter','tahun_filter','kondisi_filter','transmisi_filter','bahan_bakar_filter','tahun','model','tipe','lokasi','merek','mobil_filter','harga','transmisi','bahan_bakar','bahan_bakar','master_jenis','master_merk','master_model','master_lokasi','master_tahun','harga_low','harga_high','data_setting','search'));
        }
    }

