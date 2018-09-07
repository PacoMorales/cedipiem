<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAT_MESES extends Model
{
    protected $table = 'CAT_MESES';
    protected  $primaryKey = 'CVE_MES';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CVE_MES', 
	    'DESC_MES'
    ];
}
