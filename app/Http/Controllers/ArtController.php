<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Art;
use App\Likes;

class ArtController extends Controller
{
    public function gallery($catagory){
    	//$art = DB::select(DB::raw("Select DISTINCT a.id, a.title, a.square, l.likes, l.dislikes, l.uid From Arts a, Likes l Where a.catagory = '".$catagory."'"));
        $art = Art::where("Catagory", '=', $catagory)->get();
        $likes = array();

        foreach($art as $a){
            $likes[] = Likes::where("aid", '=', $a->id)->first();
        }

    	return view('images.viewCatagory', compact('art', 'likes'));
    }

    public function add(){
    	//$home = DB::select(DB::raw("insert into Arts values ('1',".request('title')."','".request('photo')."','".request('square')."','".request('catagory')."')"));
        $home = Art::create([
            'Aid' => '0',
            'Title' => request('title'),
            'Photo' => request('photo'),
            'Square' => request('square'),
            'Catagory' => request('catagory'),
        ]);
    	return redirect(route('home'));
    }

    public function picture($id){
    	//$art = DB::select(DB::raw("  select picture by id with likes  "));
        $art = Art::find($id);
        $gallery = Art::where("Catagory", '=', $art->Catagory)->get();
        $likes = Likes::where("aid", "=", $id)->first();
    	return view('images.viewPicture', compact('art', 'likes', 'gallery'));
    }

    public function addPicture(){
        return view('images.addImage');
    }

    public function searchPage(){
        $art = Art::where("Title", 'LIKE', request("s")."%")->get();
        $likes = array();

        foreach($art as $a){
            $likes[] = Likes::where("aid", '=', $a->id)->first();
        }
        return view('images.viewCatagory', compact('art', 'likes'));
    }

    public function search(){
        $result = Art::where("Title", 'LIKE', request("val")."%")->get();
        return $result;
    }
}
