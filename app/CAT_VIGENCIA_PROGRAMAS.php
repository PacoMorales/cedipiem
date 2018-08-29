<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_VIGENCIA_PROGRAMAS extends Model
{
    protected $table = "CAT_VIGENCIA_PROGRAMAS";
    protected  $primaryKey = 'N_PERIODO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA',
	    'FECHA_INICIAL',
	    'FECHA_FINAL',
	    'COMENTARIO_1',
	    'STATUS'
    ];
}
