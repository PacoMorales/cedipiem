<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_CAT_TURNO extends Model
{
    protected $table = "LU_CAT_TURNO";
    protected  $primaryKey = 'CVE_TURNO';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_TURNO', 
	    'DESC_TURNO'
    ];
}
