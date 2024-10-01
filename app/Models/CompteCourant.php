<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompteCourant extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'description'
    ];
}
