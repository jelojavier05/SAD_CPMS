<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Measurement extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblmeasurement';
    protected $primaryKey = 'intMeasurementID';
    public $timestamps = false;
    
    public function BodyAttribute(){
        return $this->belongsTo('App\Model\BodyAttribute', 'intMeasurementID', 'intMeasurementID');
    }
    
}
