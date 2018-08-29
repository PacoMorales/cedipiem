<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class METADATO_PADRINOS extends Model
{
    protected $table = 'METADATO_PADRINOS';
    protected  $primaryKey = 'CVE_PADRINO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SP', 
	    'CVE_PADRINO', 
	    'APELLIDO_PATERNO',
	    'APELLIDO_MATERNO',
	    'NOMBRES',
	    'NOMBRE_COMPLETO',
	    'FECHA_NACIMIENTO',
      	'RFC',
      	'CURP',
	    'SEXO',
	    'CVE_ENTIDAD_NACIMIENTO',
	    'CVE_ENTIDAD_FEDERATIVA',
	    'CVE_MUNICIPIO',
	    'CVE_MUNICIPIO_LAB',
	    'CALLE',
	    'COLONIA',
	    'CP',
	    'ENTRE_CALLE',
	    'Y_CALLE',
	    'OTRA_REFERENCIA',
	    'LADA_TEL',
	    'TELEFONO',
	    'LADA_CEL',
	    'CELULAR',
	    'LADA_LAB',
	    'TELEFONO_LAB',
	    'CORREO_ELECT',
	    'DIRECCION_LAB',
	    'CVE_GRADO_ESTUDIO',
	    'PROFESION', //ESTE DE DONDE SALE ?
	    'CVE_CARGO',
	    'CARGO',
	    'CLASIFICGOB_ID',
	    'CVE_DEPENDENCIA',
	    'ESTRUCGOB_ID',
	    'UNIDAD_ADMIN',
	    'INSTITUCION',
	    'STATUS_1',
	    'STATUS_2',
	    'OBS',
	    'USU',
	    'PW',
	    'IP',
	    'FECHA_REG',
	    'USU_M',
	    'PW_M',
	    'IP_M',
	    'FECHA_M',
	    'N_PERIODO',
	    'STATUS_3',
	    'SECRETARIA'
    ];

    public static function validaNombres($paterno,$materno,$nombre){
    	$completo = $paterno.$materno.$nombre;
    	$completo = str_replace(" ","", $completo);
    	if(ctype_alpha($completo)){
    		return true;
    	}else{
    		return false;
    	}
    	return false;
    }

    public static function validaCurp($fecha_aux,$curp_aux){
        $fecha  = strtoupper($fecha_aux);
        if($curp_aux==NULL)
        	return true;
        $curp   = strtoupper($curp_aux);
        $fecha_esp  = str_replace("/", "", $fecha);
        $dia        = substr($fecha_esp, 0, 2);
        $mes        = substr($fecha_esp, 2, 2);
        $anio       = substr($fecha_esp, 6, 2);
        $fechaCurp  = substr($curp, 4, 6);
        $armada     = $anio.$mes.$dia;
        if ($fechaCurp != $armada){
        	return false;
        }else
            return true;
    }

    public static function validaRFC($fecha_aux,$curp_aux,$rfc_aux){
        $fecha = $fecha_aux;
        if($curp_aux==NULL OR $rfc_aux==NULL)
        	return true;
        $curp  = $curp_aux;
        $rfc   = $rfc_aux;
        $fecha_esp = str_replace("/", "", $fecha);
        $dia       = substr($fecha_esp, 0, 2);
        $mes       = substr($fecha_esp, 2, 2);
        $anio      = substr($fecha_esp, 6, 2);
        $fechaRfc  = substr($rfc, 4, 6);
        $rfc10 	   = substr($rfc, 0, 10);
        $curp10    = substr($curp, 0, 10);
        $armada    = $anio.$mes.$dia;
        //dd($fechaRfc.' != '.$armada.' y la otra condicion '.$rfc10.' != '.$curp10);
        if ($fechaRfc != $armada){
        	//dd('1');
            return false;
        }else
        	if ($rfc10 != $curp10){
        		//dd('2');
            	return false;
        	}else
        		return true;
    }

    public static function validaDuplicados($nombre_aux,$fecha_aux,$municipio_aux){
        $nombre     = strtoupper($nombre_aux);
        $fecha      = strtoupper($fecha_aux);
        $municipio  = strtoupper($municipio_aux);
            //dd($fecha);
            $fecha_esp  = str_replace("/", "", $fecha);
            $dia        = substr($fecha_esp, 6, 2);
            $mes        = substr($fecha_esp, 4, 2);
            $anio       = substr($fecha_esp, 0, 4);
            //$fecha_ok   = $anio."/".$mes."/".$dia;
            $fecha_ok   = $anio.'-'.$mes.'-'.$dia.' 00:00:00';
            //dd($fecha_ok);
            //dd('ValidaDuplicados con '.$nombre.'-'.$fecha_ok.'-'.$municipio);
            //$prueba = FURWEB_METADATO_299::find(300001);
            //dd($prueba);
        $dup = METADATO_PADRINOS::where([
                                                'NOMBRE_COMPLETO' => $nombre,
                                                'FECHA_NACIMIENTO' => $fecha_ok,
                                                'CVE_MUNICIPIO' => $municipio
                                            ])->get();
        //dd($dup);
        //dd('ValidaDuplicados');
        if($dup->count()==1 || !$dup->count()){ //SI NO EXISTE, REGRESA TRUE
            //dd('if($dup = NULL)');
            return true;
        }
        else{
            //dd('if($dup != NULL)');
            return false; //SI EXISTE
        }
    }
}
