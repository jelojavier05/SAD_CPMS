<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GuardLicense extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'tblguardlicense';
    protected $primaryKey = 'intGuardLicenseID';
    
    public function GuardBodyAttribute(){
        return $this->belongsTo('App\Model\Guard', 'intGuardID', 'intGuardID');
    }
}
