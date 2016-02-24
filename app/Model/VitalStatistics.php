<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VitalStatistics extends Model
{
    protected $table = 'tblvitalstatistics';
    protected $primaryKey = 'intVitalStatisticsID';
    public $timestamps = false;
}
