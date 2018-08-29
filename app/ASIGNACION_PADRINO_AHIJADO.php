<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ASIGNACION_PADRINO_AHIJADO extends Model
{
    protected $table = "ASIGNACION_PADRINO_AHIJADO";
    protected  $primaryKey = 'CVE_PADRINO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO', 
	    'CVE_PROGRAMA',
	    'FOLIO',
	    'FOLIO_RELACIONADO',
	    'CVE_SP',
	    'CVE_PADRINO',
	    'ID_QUINCENA',
	    'MES_APLICACION',
	    'TRIMESTRE',
	    'ETAPA',
	    'STATUS_1',
	    'STATUS_2',
	    'OBS',
	    'FECHA_REG',
	    'USU',
	    'PW',
	    'IP',
	    'FECHA_M',
	    'USU_M',
	    'PW_M',
	    'IP_M',
	    'FOLIO_ANT',
	    'TRX_ID',
	    'STATUS_5',
	    'N_PERIODO_APLICACION',
	    'OBS_1',
	    'OBS_2'
    ];
}
