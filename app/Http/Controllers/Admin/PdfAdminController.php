<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\MasterPdf;
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

class PdfAdminController extends Controller
{
    //
    public function index(){
    	$pdf = DB::table('master_pdfs')
        ->orderBy('id','desc')
        ->get();
        return view('Admin.pdf.index',compact('pdf'));
    }

    public function create(){
        
        return view('Admin.pdf.tambah');
    }

    public function store(Request $request){

    	
        $pdf = $request->file('pdf');

        $data = new MasterPdf();

        if ($pdf->getClientOriginalExtension() != 'pdf') {
            return Redirect::back()->with('msg','gagal');
        }

        $file_name = Carbon::now()->timestamp ."_pdf_.". $pdf->getClientOriginalExtension();
        $filePath = 'storage/data/pdf/';
        $pdf->move($filePath,$file_name);
        
        if(!file_exists(storage_path('data/pdf/'.$file_name))){
            return Redirect::back()->with('msg','gagal');
        }

        $data->pdf = $file_name;
        $data->name = $request->input('name');
        
        if ($data->save()) {
            return Redirect::to('data-pdf')->with('msg','berhasil');
        }else{
            return Redirect::to('data-pdf')->with('msg','gagal');
        }

    }

    public function edit($id){
        $pdf = MasterPdf::find($id);
        return view::make('Admin.pdf.edit',compact('pdf'));
    }
    

    public function update(Request $request,$id){
    	$pdf = $request->file('pdf');

        $data = MasterPdf::find($id);
        if ($pdf != "") {
            if ($pdf->getClientOriginalExtension() != 'pdf') {
                return Redirect::back()->with('msg','gagal');
            }
            $file_name = Carbon::now()->timestamp ."_pdf_.". $pdf->getClientOriginalExtension();
            $filePath = 'storage/data/pdf/';
            $pdf->move($filePath,$file_name);
            if(!file_exists(storage_path('data/pdf/'.$file_name))){
                return Redirect::back()->with('msg','gagal');
                if (file_exists(storage_path('data/pdf/'.$data->pdf))) {
                    unlink(storage_path('data/pdf/'.$data->pdf));
                }
            }
            $data->pdf = $file_name;
        }

        $data->name = $request->input('name');
        
        if ($data->save()) {
            return Redirect::to('data-pdf')->with('msg','berhasil');
        }else{
            return Redirect::to('data-pdf')->with('msg','gagal');
        }
    }

    public function destroy($id){
        $data = MasterPdf::find($id);
        if (file_exists(storage_path('data/pdf/'.$data->pdf))) {
            unlink(storage_path('data/pdf/'.$data->pdf));
        }
        if ($data->delete()) {
            return Redirect::to('data-pdf')->with('msg','berhasil_hapus');
        }else{
            return Redirect::to('data-pdf')->with('msg','gagal_hapus');
        }
    }
}
