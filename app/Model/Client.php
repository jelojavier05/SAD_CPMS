<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblclient';
    protected $primaryKey = 'intClientID';
    
    public function Province(){
        return $this->hasOne('App\Model\NatureOfBusiness', 'intNatureOfBusinessID', 'intNatureOfBusinessID');
    }
}
