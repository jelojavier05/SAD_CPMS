<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardArmedService extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblguardarmedservice';
    protected $primaryKey = 'intGuardArmedServiceID';
    public $timestamps = false;
    
    public function Guard(){
        return $this->belongsTo('App\Model\Guard', 'intGuardID', 'intGuardID');
    }
    
    public function ArmedService(){
        return $this->belongsTo('App\Model\ArmedService', 'intArmedServiceID', 'intArmedServiceID');
    }
}