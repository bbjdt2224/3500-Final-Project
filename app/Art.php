<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $fillable = [
        'Aid','Title','Photo','Square','Catagory',
    ];
}
