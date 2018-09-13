<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_MUNICIPIOS_SEDESEM extends Model
{
    protected $table = 'CAT_MUNICIPIOS_SEDESEM';
    protected  $primaryKey = 'MUNICIPIOID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'ENTIDADFEDERATIVAID', 
	    'MUNICIPIOID',
	    'MUNICIPIONOMBRE'
    ];

    public static function Municipios(){
    //return CAT_MUNICIPIOS_SEDESEM::all();
				
	return CAT_MUNICIPIOS_SEDESEM::select('MUNICIPIOID','MUNICIPIONOMBRE')
				->where('ENTIDADFEDERATIVAID',15)
				->whereIn('MUNICIPIOID',[1,3,5,7,9,14,19,26,32,64,41,42,45,47,48,49,51,52,54,56,62,63,67,74,124,79,80,82,85,86,87,90,99,101,102,106,110,111,112,114,43,115,118])
				->orderBy('MUNICIPIONOMBRE','ASC')
				->get();
}
}
