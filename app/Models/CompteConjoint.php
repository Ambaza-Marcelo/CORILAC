<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompteConjoint extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'description'
    ];
}
