<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompteDevise extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'description'
    ];
}
