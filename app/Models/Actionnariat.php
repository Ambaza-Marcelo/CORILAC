<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actionnariat extends Model
{
    //
    protected $fillable = [
    	'description',
		'title',
		'percent'
    ];
}
