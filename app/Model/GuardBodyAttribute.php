<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardBodyAttribute extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblguardbodyattribute';
    protected $primaryKey = 'intGuardBodyAttributeID';
    public $timestamps = false;
    
    public function Guard(){
        return $this->belongsTo('App\Model\Guard', 'intGuardID', 'intGuardID');
    }
    
    public function BodyAttribute(){
        return $this->belongsTo('App\Model\BodyAttribute', 'intBodyAttributeID', 'intBodyAttributeID');
    }
}