<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_DEPENDENCIAS extends Model
{
    protected $table = "LU_DEPENDENCIAS";
    protected  $primaryKey = 'DEPEN_ID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'DEPEN_ID', 
	    'DEPEN_DESC'
    ];

    public static function obtenerDependencia($id)
    {
    	return LU_DEPENDENCIAS::select('DEPEN_ID','DEPEN_DESC','ESTRUCGOB_ID','CLASIFICGOB_ID')
                              ->where('DEPEN_ID','like','%'.$id.'%')
                              //->orderBy('DEPEN_DESC','ASC')
                              ->get();
    }
}
