<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblprovince';
    protected $primaryKey = 'intProvinceID';
    public $timestamps = false;
    
    public function City(){
        return $this->hasMany('App\Model\City', 'intProvinceID', 'intProvinceID');
    }
}
