<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArmedService extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblarmedservice';
    protected $primaryKey = 'intArmedServiceID';
    public $timestamps = false;
    
    public function GuardArmedService(){
        return $this->hasOne('App\Model\ArmedService', 'intArmedServiceID', 'intArmedServiceID');
    }
}
