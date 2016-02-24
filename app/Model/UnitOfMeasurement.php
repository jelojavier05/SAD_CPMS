<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    protected $table = 'tblunitofmeasurement';
    protected $primaryKey = 'intUnitOfMeasurementID';
    public $timestamps = false;
}
