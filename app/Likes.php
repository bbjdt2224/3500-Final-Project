<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = [
        'uid','aid','Likes','Dislikes',
    ];               
}
