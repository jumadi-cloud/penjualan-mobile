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
use App\Setting;

class DetailsFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$merek)
    {
        //
            $data_setting = Setting::find(1);
            $mobil = DB::table('mobil')
            ->select('mobil.*')
            ->where('id',$id)
            ->get();
             $mobil_lain = DB::table('mobil')
             ->where('tipe',$mobil[0]->tipe)
             ->whereNotIn('id',[$id])
             ->where('deleted_at',null)
             ->orderBy('id','desc')
             ->take(3)
             ->get();
             $galeri = DB::table('galeri_mobil')
                ->where('id_mobil',$id)
                ->get();
        return view('Frontend.Details.Details_frontend',compact('mobil','mobil_lain','galeri','data_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
