<?php

namespace App\Http\Controllers;

use Auth;
use App\Likes;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($id){
    	$likes = Likes::where("aid", "=", $id)->first();
    	if($likes != null){
    		$num = $likes->Likes;
    		$num ++;
    		$likes->update(["Likes"=>$num]);
    	}
    	else{
    		Likes::create([
    			'uid' => Auth::id(),
    			'aid' => $id,
    			'Likes' => "1",
    			'Dislikes' => "0",
    		]);
    	}
    	return back();
    }
    public function dislike($id){
    	$likes = Likes::where("aid", "=", $id)->first();
    	if($likes != null){
    		$num = $likes->Dislikes;
    		$num ++;
    		$likes->update(["Dislikes"=>$num]);
    	}
    	else{
    		Likes::create([
    			'uid' => Auth::id(),
    			'aid' => $id,
    			'Likes' => "0",
    			'Dislikes' => "1",
    		]);
    	}
    	return back();
    }
}
