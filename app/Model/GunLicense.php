<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GunLicense extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'tblgunlicense';
    protected $primaryKey = 'intGunLicenseID';
    
    public function Gun(){
        return $this->belongsTo('App\Model\Gun', 'intGunID', 'intGunID');
    }
}
