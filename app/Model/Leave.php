<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{

	use SoftDeletes;
    protected $table = 'tblleave';
    protected $primaryKey = 'intLeaveID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
