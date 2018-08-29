<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_CENTRO_TRABAJO extends Model
{
    protected $table = 'CAT_CENTRO_TRABAJO';
    protected  $primaryKey = 'CVE_CCT';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_CCT', 
	    'NO_SUBCEDE',
	    'CVE_SUBSISTEMA',
	    'CVE_NIVEL',
	    'CVE_NIVEL_EDUCATIVO',
	    'DESC_CCT',
	    'CALLE',
	    'NO_EXTERIOR',
	    'CVE_MUNICIPIO',
	    'STATUS_4',
	    'FECHA_REG',
	    'USU',
	    'PW',
	    'IP',
	    'FECHA_M',
	    'USU_M',
	    'PW_M',
	    'IP_M',
	    'CONSECUTIVO',
	    'N_PERIODO',
    ];
}
