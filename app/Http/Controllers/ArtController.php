<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function gallery($catagory){

    	return view('images.viewCatagory()', compact('art'));
    }
}
