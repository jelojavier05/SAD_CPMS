<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalStatistics extends Model
{

	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblvitalstatistics';
    protected $primaryKey = 'intVitalStatisticsID';
    public $timestamps = false;
}
