<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Art;
use App\Likes;

class ArtController extends Controller
{
    public function gallery($catagory){
    	$art = DB::select(DB::raw("Select a.photo, l.likes, l.dislikes From Arts a, Likes l Where a.aid = l.aid and catagory = '".$catagory."'"));
    	return view('images.viewCatagory()', compact('art'));
    }

    public function add(){
    	DB::select(DB::raw("insert into table values (".$id.",".$Title.",".$Photo.",".$Square.",".$Catagory.","")");
    }
}
