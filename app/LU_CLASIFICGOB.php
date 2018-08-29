<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LU_CLASIFICGOB extends Model
{
    protected $table = "LU_CLASIFICGOB";
    protected  $primaryKey = 'CLASIFICGOB_ID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
	    'CLASIFICGOB_ID', 
	    'CLASIFICGOB_DESC'
    ];
}
