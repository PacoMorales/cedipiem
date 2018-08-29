<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_CAT_SUBSISTEMA extends Model
{
    protected $table = "LU_CAT_SUBSISTEMA";
    protected  $primaryKey = 'CVE_SUBSISTEMA';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_SUBSISTEMA', 
	    'DESC_SUBSISTEMA'
    ];
}
