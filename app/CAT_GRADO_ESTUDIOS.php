<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_GRADO_ESTUDIOS extends Model
{
    protected $table = 'CAT_GRADO_ESTUDIO';
    protected  $primaryKey = 'CVE_GRADO_ESTUDIOS';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_GRADO_ESTUDIOS', 
	    'GRADO_ESTUDIOS'
    ];
}
