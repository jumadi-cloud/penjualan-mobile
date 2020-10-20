<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use Validator;
use View;
use Image;
use File;
use Mail;
use DB;
use PDF;

class ListFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $mobil = DB::table('mobil')
            ->select('mobil.*')
            ->where('deleted_at',null)
            ->orderBy('id','desc')
            ->paginate(5);

            $merek = DB::table('mobil')
            ->select('mobil.merek')
            ->where('deleted_at',null)
            ->where('merek','!=','')
            ->groupBy('merek')
            ->get();
        $lokasi = DB::table('mobil')
            ->select('mobil.lokasi')
            ->where('deleted_at',null)
            ->where('lokasi','!=','')
            ->groupBy('lokasi')
            ->get();
        $harga = DB::table('mobil')
            ->select('mobil.harga')
            ->where('deleted_at',null)
            ->where('harga','!=','')
            ->groupBy('harga')
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
        $kondisi = DB::table('mobil')
            ->select('mobil.kondisi')
            ->where('deleted_at',null)
            ->where('kondisi','!=','')
            ->groupBy('kondisi')
            ->get();
        $transmisi = DB::table('mobil')
            ->select('mobil.transmisi')
            ->where('deleted_at',null)
            ->where('transmisi','!=','')
            ->groupBy('transmisi')
            ->get();
        $bahan_bakar = DB::table('mobil')
            ->select('mobil.bahan_bakar')
            ->where('deleted_at',null)
            ->where('bahan_bakar','!=','')
            ->groupBy('bahan_bakar')
            ->get();

             // $mobil_lain = DB::table('mobil')
             // ->select('mobil.*')
             // ->where('merek',$merek)
             // ->whereNotIn('id',[$id])
             
             // ->get();
        return view('Frontend.List.List_frontend',compact('mobil','merek','lokasi','harga','tipe','tahun','kondisi','transmisi','bahan_bakar'));
    }
    public function indexMerek($merek)
    {
        //
            $mobil = DB::table('mobil')
            ->select('mobil.*')
            ->where('deleted_at',null)
            ->where('merek',$merek)
            ->orderBy('id','desc')
            ->paginate(5);


        $merek = DB::table('mobil')
            ->select('mobil.merek')
            ->where('deleted_at',null)
            ->where('merek','!=','')
            ->groupBy('merek')
            ->get();
        $lokasi = DB::table('mobil')
            ->select('mobil.lokasi')
            ->where('deleted_at',null)
            ->where('lokasi','!=','')
            ->groupBy('lokasi')
            ->get();
        $harga = DB::table('mobil')
            ->select('mobil.harga')
            ->where('deleted_at',null)
            ->where('harga','!=','')
            ->groupBy('harga')
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
        $kondisi = DB::table('mobil')
            ->select('mobil.kondisi')
            ->where('deleted_at',null)
            ->where('kondisi','!=','')
            ->groupBy('kondisi')
            ->get();
        $transmisi = DB::table('mobil')
            ->select('mobil.transmisi')
            ->where('deleted_at',null)
            ->where('transmisi','!=','')
            ->groupBy('transmisi')
            ->get();
        $bahan_bakar = DB::table('mobil')
            ->select('mobil.bahan_bakar')
            ->where('deleted_at',null)
            ->where('bahan_bakar','!=','')
            ->groupBy('bahan_bakar')
            ->get();

             // $mobil_lain = DB::table('mobil')
             // ->select('mobil.*')
             // ->where('merek',$merek)
             // ->whereNotIn('id',[$id])
             
             // ->get();
        return view('Frontend.List.ListMerek_frontend',compact('mobil','merek','lokasi','harga','tipe','tahun','kondisi','transmisi','bahan_bakar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFilter()
    {
        $tahun = Input::get('tahunFilter');
        // $kondisi = Input::get('kondisiFilter');
        $tipe = Input::get('tipeFilter');
        $lokasi = Input::get('lokasiFilter');
        $merek = Input::get('merekFilter');
        $harga = Input::get('hargaFilter');
        $transmisi = Input::get('transmisiFilter');
        $bahan_bakar = Input::get('bahan_bakarFilter');


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
        // $kondisi_filter = DB::table('mobil')
        //     ->select('mobil.kondisi')
        //     ->where('deleted_at',null)
        //     ->where('kondisi','!=','')
        //     ->groupBy('kondisi')
        //     ->get();
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


        // SATU KONDISI START
        if ($merek != "") {
          $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             
             ->orderBy('id','desc')
             ->get();
        }
        elseif($harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        elseif ($tipe != "") {
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif ($tahun != "") {
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif ($kondisi != "") {
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif ($transmisi != "") {
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif ($bahan_bakar != "") {
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        // SATU KONDISI END

        // DUA KONDISI START
        elseif($tipe != "" && $lokasi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $tahun != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('tahun',$tahun)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $merek != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('merek',$merek)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($tipe != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('tipe',$tipe)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($tipe != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $merek != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('merek',$merek)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($lokasi != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('lokasi',$lokasi)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($lokasi != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($lokasi != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('lokasi',$lokasi)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($tahun != "" && $merek != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $kondisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('kondisi',$kondisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($merek != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($merek != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('merek',$merek)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($merek != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($merek != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($transmisi != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('transmisi',$transmisi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($kondisi != "" && $bahan_bakar != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('bahan_bakar',$bahan_bakar)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        // elseif($kondisi != "" && $transmisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        //DUA KONDISI END

        // TIGA KONDISI START
        elseif($tipe != "" && $lokasi != "" && $tahun != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $lokasi != "" && $merek != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('merek',$merek)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $lokasi != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($tipe != "" && $lokasi != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('tipe',$tipe)
        //      ->where('lokasi',$lokasi)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($tipe != "" && $lokasi != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $lokasi != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $merek != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($lokasi != "" && $tahun != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('lokasi',$lokasi)
        //      ->where('tahun',$tahun)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($lokasi != "" && $tahun != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $merek != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $merek != "" && $tipe != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('tipe',$tipe)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($tahun != "" && $merek != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('tahun',$tahun)
        //      ->where('merek',$merek)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($tahun != "" && $merek != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tahun != "" && $merek != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($merek != "" && $harga != "" && $tipe != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('harga',$harga)
             ->where('merek',$merek)
             ->where('tipe',$tipe)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($merek != "" && $harga != ""  && $lokasi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->where('lokasi',$lokasi)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($merek != "" && $harga != ""  && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('merek',$merek)
        //      ->where('harga',$harga)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($merek != "" && $harga != ""  && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($merek != "" && $harga != ""  && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($harga != "" && $tipe != ""  && $tahun != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('harga',$harga)
             ->where('tipe',$tipe)
             ->where('tahun',$tahun)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($harga != "" && $tipe != ""  && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('harga',$harga)
        //      ->where('tipe',$tipe)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($harga != "" && $tipe != ""  && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('harga',$harga)
             ->where('tipe',$tipe)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($harga != "" && $tipe != ""  && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('harga',$harga)
             ->where('tipe',$tipe)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($kondisi != "" && $transmisi != ""  && $tahun != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->where('tahun',$tahun)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        // elseif($kondisi != "" && $transmisi != ""  && $tipe != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->where('tipe',$tipe)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        // elseif($kondisi != "" && $transmisi != ""  && $merek != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->where('merek',$merek)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        // elseif($kondisi != "" && $transmisi != ""  && $lokasi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->where('lokasi',$lokasi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        // elseif($kondisi != "" && $transmisi != ""  && $harga != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->where('harga',$harga)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        // elseif($kondisi != "" && $transmisi != ""  && $bahan_bakar != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('kondisi',$kondisi)
        //      ->where('transmisi',$transmisi)
        //      ->where('bahan_bakar',$bahan_bakar)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($transmisi != ""  && $bahan_bakar != "" && $tahun != "" ){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('transmisi',$transmisi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($transmisi != ""  && $bahan_bakar != "" && $tipe != "" ){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('transmisi',$transmisi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($transmisi != ""  && $bahan_bakar != "" && $merek != "" ){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('transmisi',$transmisi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($transmisi != ""  && $bahan_bakar != "" && $lokasi != "" ){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('transmisi',$transmisi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($transmisi != ""  && $bahan_bakar != "" && $harga != "" ){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('harga',$harga)
             ->where('transmisi',$transmisi)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        // TIGA KONDISI END

        //EMPAT KONDISI START
        elseif($tipe != "" && $lokasi != "" && $tahun != "" && $merek != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $lokasi != "" && $tahun != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        // elseif($tipe != "" && $lokasi != "" && $tahun != "" && $kondisi != ""){
        //     $mobil_filter = DB::table('mobil')
        //      ->select('mobil.*')
        //      ->where('deleted_at',null)
        //      ->where('tipe',$tipe)
        //      ->where('lokasi',$lokasi)
        //      ->where('tahun',$tahun)
        //      ->where('kondisi',$kondisi)
        //      ->orderBy('id','desc')
        //      ->get();
        // }
        elseif($tipe != "" && $lokasi != "" && $tahun != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($tipe != "" && $lokasi != "" && $tahun != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $merek != "" && $harga != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $merek != "" && $kondisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('kondisi',$kondisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $merek != "" && $transmisi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('transmisi',$transmisi)
             ->orderBy('id','desc')
             ->get();
        }
        elseif($lokasi != "" && $tahun != "" && $merek != "" && $bahan_bakar != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('bahan_bakar',$bahan_bakar)
             ->orderBy('id','desc')
             ->get();
        }
        elseif( $tahun != "" && $merek != "" && $harga != "" && $tipe != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('tahun',$tahun)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->where('tipe',$tipe)
             ->orderBy('id','desc')
             ->get();
        }
        elseif( $merek != "" && $harga != "" && $tipe != "" && $lokasi != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->orderBy('id','desc')
             ->get();
        }
        //EMPAT KONDISI END
        //LIMA KONDISI START
        elseif( $merek != "" && $harga != "" && $tipe != "" && $lokasi != "" && $tahun != ""){
            $mobil_filter = DB::table('mobil')
             ->select('mobil.*')
             ->where('deleted_at',null)
             ->where('merek',$merek)
             ->where('harga',$harga)
             ->where('tipe',$tipe)
             ->where('lokasi',$lokasi)
             ->where('tahun',$tahun)
             ->orderBy('id','desc')
             ->get();
        }


         return view::make('Frontend.List.List_filter',compact('merek_filter','lokasi_filter','harga_filter','tipe_filter','tahun_filter','kondisi_filter','transmisi_filter','bahan_bakar_filter'))->with('mobil_filter', $mobil_filter);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}

