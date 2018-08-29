<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_ESTRUCGOB extends Model
{
    protected $table = "LU_ESTRUCGOB";
    protected  $primaryKey = 'ESTRUCGOB_ID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'ESTRUCGOB_ID', 
	    'ESTRUCGOB_DESC',
        'CLASIFICGOB_ID'
    ];

    public static function obtenerEstructuras($id){
    	return LU_ESTRUCGOB::where('CLASIFICGOB_ID',$id)
                              ->orderBy('ESTRUCGOB_DESC','ASC')
                              ->get();
    }

    public static function Estrc($valor){
        return LU_ESTRUCGOB::where('ESTRUCGOB_ID',$valor)->get();
    }
}
