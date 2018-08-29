<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_CAT_NIVEL extends Model
{
    protected $table = "LU_CAT_NIVEL";
    protected  $primaryKey = 'CVE_NIVEL';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_NIVEL', 
	    'DESC_NIVEL'
    ];
}
