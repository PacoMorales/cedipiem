<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_REGIONES_SEDESEM extends Model
{
    protected $table = 'CAT_REGIONES_SEDESEM';
    protected  $primaryKey = 'REGIONID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'REGIONID', 
	    'REGIONDESCRIPCION'
    ];
}
