<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FURWEB_METADATO_13;

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

    public static function Ahijado($clave){
    	//FURWEB_METADATO_13 contiene a todos los ahijados
    	//METADATO_PADRINOS contiene a todos los padrinos
    	return ASIGNACION_PADRINO_AHIJADO::join('FURWEB_METADATO_13','ASIGNACION_PADRINO_AHIJADO.FOLIO','=','FURWEB_METADATO_13.FOLIO')
    										->selectRaw('FURWEB_METADATO_13.NOMBRE_COMPLETO, FURWEB_METADATO_13.SEXO, FURWEB_METADATO_13.COLONIA, FURWEB_METADATO_13.NOMBRE_COMPLETO_C')
    										->where('ASIGNACION_PADRINO_AHIJADO.CVE_PADRINO',$clave)
    										->where('FURWEB_METADATO_13.N_PERIODO',2018)
    										->where('FURWEB_METADATO_13.CVE_PROGRAMA',13)
    										->get();

    }
}
