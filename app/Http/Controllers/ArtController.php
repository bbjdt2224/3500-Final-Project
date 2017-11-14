<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;
use App\Likes;

class ArtController extends Controller
{
    public function gallery($catagory){
    	$art = DB::raw("Select a.photo, l.likes, l.dislikes From Art a, Likes l Where a.aid = l.aid and catagory = '".$catagory."'");
    	dd($art);
    	return view('images.viewCatagory()', compact('art'));
    }
}
