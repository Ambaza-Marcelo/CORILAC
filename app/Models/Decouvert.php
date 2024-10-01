<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decouvert extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'description',
		'caracteristique'
    ];
}
