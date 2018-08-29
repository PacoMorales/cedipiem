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

    public static function obtenerDependencias($id)
    {
    	return LU_DEPENDENCIAS::where('ESTRUCGOB_ID',$id)
                              ->orderBy('DEPEN_DESC','ASC')
                              ->get();
    }
}
