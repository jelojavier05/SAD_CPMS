<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblcity';
    protected $primaryKey = 'intCityID';
    public $timestamps = false;
    
    public function Province(){
        return $this->belongsTo('App\Model\Province', 'intProvinceID', 'intProvinceID');
    }
}
