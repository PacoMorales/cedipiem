<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_CAT_QUINCENAS extends Model
{
    protected $table = "LU_CAT_QUINCENAS";
    protected  $primaryKey = 'ID_QUINCENA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'ID_QUINCENA', 
	    'DESC_QUINCENA',
	    'MES_APLICACION'
    ];

    public static function Quincenas(){
    	return LU_CAT_QUINCENAS::select('ID_QUINCENA','DESC_QUINCENA')
    							->where('ID_QUINCENA','>',0)
    							->orderBy('ID_QUINCENA','ASC')
    							->get();
    }	
}
