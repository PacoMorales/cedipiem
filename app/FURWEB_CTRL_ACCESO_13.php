<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_CTRL_ACCESO_13 extends Model
{
    protected $table = 'FURWEB_CTRL_ACCESO_13';
    protected  $primaryKey = 'LOGIN';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA', 
	    'FOLIO',
	    'CVE_DEPENDENCIA',
	    'LOGIN',
	    'PASSWORD',
	    'TIPO_USUARIO',
      	'STATUS_1',
      	'STATUS_2',
	    'FECHA_REGISTRO'
    ];
}
