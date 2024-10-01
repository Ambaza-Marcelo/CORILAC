<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coricash extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'description'
    ];
}
