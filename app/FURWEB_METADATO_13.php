<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FURWEB_METADATO_13 extends Model
{
    protected $table = 'FURWEB_METADATO_13';
    protected  $primaryKey = 'CVE_PADRINO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'N_PERIODO',
	    'CVE_PROGRAMA',
	    'FOLIO',
	    'FOLIO_RELACIONADO',
	    'PRIMER_APELLIDO',
	    'SEGUNDO_APELLIDO',
	    'NOMBRES',
	    'NOMBRE_COMPLETO',
	    'FECHA_NACIMIENTO',
	    'SEXO',
	    'CVE_MUNICIPIO',
	    'CVE_REGION'
    ];
}
