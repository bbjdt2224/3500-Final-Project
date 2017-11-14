<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Art;
use App\Likes;

class ArtController extends Controller
{
    public function gallery($catagory){
    	$art = DB::select(DB::raw("Select a.square, l.likes, l.dislikes From Arts a, Likes l Where a.aid = l.aid and catagory = '".$catagory."'"));
    	return view('images.viewCatagory', compact('art'));
    }

    public function add(){
    	DB::select(DB::raw("  insert into table  "));
    	return redirect(route('home'))
    }

    public function picture($id){
    	$art = DB::select(DB::raw("  select picture by id with likes  "));
    	retrun view('images.viewPicture', compact('art'));
    }
}
