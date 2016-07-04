<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guard extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblguard';
    protected $primaryKey = 'intGuardID';
    
    public function GuardBodyAttribute(){
        return $this->hasMany('App\Model\GuardBodyAttribute', 'intGuardID', 'intGuardID');
    }
    
    public function GuardArmedService(){
        return $this->hasOne('App\Model\GuardArmedService', 'intGuardID', 'intGuardID');
    }
}