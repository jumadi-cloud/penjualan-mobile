<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class AdminControllerSliderHome extends Controller
{
    //
    public function index(){

    	return view('Admin.slider.index');
    }
}
