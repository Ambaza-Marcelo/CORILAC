<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtatFinancier extends Model
{
    //
    protected $fillable = [
    	'date',
		'title',
		'image',
		'file'
    ];
}
