<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'tblleave';
    protected $primaryKey = 'intLeaveID';
    public $timestamps = false;
}
