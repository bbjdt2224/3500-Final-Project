<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Art;
use App\Likes;
use Auth;

class ArtController extends Controller
{
    public function gallery($catagory){
    	//$art = DB::select(DB::raw("Select DISTINCT a.id, a.title, a.square, l.likes, l.dislikes, l.uid From Arts a, Likes l Where a.catagory = '".$catagory."'"));
        $art = Art::where("catagory", '=', $catagory)->get();
        $likes = array();
        $dislikes = array();

        foreach($art as $a){
            $l = Likes::where("aid", '=', $a->id)->get();
            foreach($l as $i){
                $likes[$i->aid] = 0;
                $dislikes[$i->aid] = 0;
                if($i->likes == 1){
                    $likes[$i->aid] ++;
                }
                elseif($i->likes == 0){
                    $dislikes[$i->aid] ++;
                }
            }
        }

    	return view('images.viewCatagory', compact('art', 'likes', 'dislikes'));
    }

    public function add(){
    	//$home = DB::select(DB::raw("insert into Arts values ('1',".request('title')."','".request('photo')."','".request('square')."','".request('catagory')."')"));
        $home = Art::create([
            'title' => request('title'),
            'photo' => request('photo'),
            'square' => request('square'),
            'catagory' => request('catagory'),
        ]);
    	return redirect(route('home'));
    }

    public function picture($id){
    	//$art = DB::select(DB::raw("  select picture by id with likes  "));
        $art = Art::find($id);
        $gallery = Art::where("catagory", '=', $art->catagory)->get();
        $likes = 0;
        $dislikes = 0;
        $l = Likes::where("aid", '=', $id)->get();
        foreach($l as $i){
            if($i->likes == 1){
                $likes ++;
            }
            elseif($i->likes == 0){
                $dislikes ++;
            }
        }
    	return view('images.viewPicture', compact('art', 'likes', 'dislikes', 'gallery'));
    }

    public function addPicture(){
        return view('images.addImage');
    }

    public function searchPage(){
        $art = Art::where("title", 'LIKE', request("s")."%")->get();
        $likes = array();

        foreach($art as $a){
            $likes[] = Likes::where("aid", '=', $a->id)->first();
        }
        return view('images.viewCatagory', compact('art', 'likes'));
    }

    public function search(){
        $result = Art::where("title", 'LIKE', request("val")."%")->get();
        return $result;
    }

    public function viewLikes(){
        $pics = Likes::where('uid', '=', Auth::id())->get();
        $art = array();
        foreach($pics as $p){
            $art[] = Art::where("id", '=', $p->aid)->first();
        }
        $likes = array();
        $dislikes = array();

        foreach($art as $a){
            $l = Likes::where("aid", '=', $a->id)->get();
            foreach($l as $i){
                $likes[$i->aid] = 0;
                $dislikes[$i->aid] = 0;
                if($i->likes == 1){
                    $likes[$i->aid] ++;
                }
                elseif($i->likes == 0){
                    $dislikes[$i->aid] ++;
                }
            }
        }

        return view('images.viewCatagory', compact('art', 'likes', 'dislikes'));
    }
}
