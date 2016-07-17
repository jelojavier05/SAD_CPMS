<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gun extends Model{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblgun';
    protected $primaryKey = 'intGunID';
    public $timestamps = false;
    
    public function TypeOfGun(){
        return $this->belongTo('App\Model\TypeOfGun', 'intTypeOfGunID', 'intTypeOfGunID');
    }
    
    public function GunLicense(){
        return $this->hasOne('App\Model\GunLicense', 'intGunID', 'intGunID');
    }
}
