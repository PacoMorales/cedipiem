<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_DIARIO_13 extends Model
{
    protected $table = "FURWEB_DIARIO_13";
    protected  $primaryKey = 'N_PERIODO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA',
	    'MES',
	    'FOLIO',
	    'FOLIO_RELACIONADO',
	    'PROCESO_ID',
	    'ACTIVIDAD_ID',
	    'TRX_ID',
	    'OBS',
	    'NO_VECES',
	    'FECHA_REG',
	    'USU',
	    'IP',
	    'FECHA_M',
	    'USU_M',
	    'IP_M'
    ];

    public static function scopebuscarTransaccion($query,$periodo,$programa,$mes,$folio,$proceso,$subproc,$trx){
    	return $query->where('N_PERIODO',$periodo)
    				 ->where('CVE_PROGRAMA',$programa)
    				 ->where('MES',$mes)
    				 ->where('FOLIO',$folio)
    				 ->where('PROCESO_ID',$proceso)
    				 ->where('ACTIVIDAD_ID',$subproc)
    				 ->where('TRX_ID',$trx);
    }
}
