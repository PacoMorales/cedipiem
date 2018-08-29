<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_CAT_NIVEL_EDUCATIVO extends Model
{
    protected $table = "LU_CAT_NIVEL_EDUCATIVO";
    protected  $primaryKey = 'CVE_NIVEL_EDUCATIVO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_NIVEL_EDUCATIVO', 
	    'DESC_NIVEL_EDUCATIVO'
    ];
}
