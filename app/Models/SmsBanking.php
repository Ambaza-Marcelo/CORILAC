<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsBanking extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'file',
		'description'
    ];
}
