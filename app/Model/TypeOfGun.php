<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfGun extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tbltypeofgun';
    protected $primaryKey = 'intTypeOfGunID';
    public $timestamps = false;
    
    public function Gun(){
        return $this->hasMany('App\Model\Gun', 'intTypeOfGunID', 'intTypeOfGunID');
    }
}
	