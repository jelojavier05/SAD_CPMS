<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NatureOfBusiness extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblnatureofbusiness';
    protected $primaryKey = 'intNatureOfBusinessID';
    public $timestamps = false;
    
    public function Client(){
        return $this->belongsTo('App\Model\Client', 'intNatureOfBusinesID', 'intNatureOfBusinesID');
    }
    
}
