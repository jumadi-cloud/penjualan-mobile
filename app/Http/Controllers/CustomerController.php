<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function register(Request $request){
        $Customer=new Customer;
        
        $Customer->nama = $request->input('nama');
        $Customer->email = $request->input('email');
        $Customer->kontak_tlp = $request->input('kontak_tlp');
        $Customer->alamat = $request->input('alamat');
        $Customer->password = $request->input('password');
        // $Customer->foto_id_card = $request->input('foto_id_card');
        // $Customer->foto_ktp = $request->input('foto_ktp');
        
        $Customer->save();
        
		return response()->json(['success' => true, 'msg' => 'Berhasil','jml'=>'1','data'=>$Customer], 200);
    }

    public function login(Request $request){
        $email=$request->input('email');
        $Customer=Customer::where('email',$email)->get();
        
        $password=$request->input('password');
        if ($password==$Customer[0]->password){
            $_SESSION['Nama']=$Customer[0]->nama;
            return response()->json(['success' => true, 'msg' => 'Berhasil','jml'=>count($Customer),'data'=>$Customer,'email'=>$email], 200);
        } else {
            $Customer=new Customer();
            return response()->json(['success' => true, 'msg' => 'Gagal Email/Password Salah','jml'=>0,'data'=>$Customer,'email'=>$email], 200);
        }
        
		
    }
}
