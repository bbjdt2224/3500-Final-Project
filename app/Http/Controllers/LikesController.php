<?php

namespace App\Http\Controllers;

use Auth;
use App\Likes;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($id){
    	$likes = Likes::where("aid", "=", $id)->where("uid", "=", Auth::id())->first();
    	if($likes != null){
    		$likes->update(["likes"=>1]);
    	}
    	else{
    		Likes::create([
    			'uid' => Auth::id(),
    			'aid' => $id,
    			'likes' => "1",
    		]);
    	}
    	return back();
    }
    public function dislike($id){
    	$likes = Likes::where("aid", "=", $id)->where("uid", "=", Auth::id())->first();
    	if($likes != null){
    		$likes->update(["likes"=>0]);
    	}
    	else{
    		Likes::create([
    			'uid' => Auth::id(),
    			'aid' => $id,
    			'likes' => "0",
    		]);
    	}
    	return back();
    }
}
