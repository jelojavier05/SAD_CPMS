<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyAttribute extends Model
{

	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblbodyattribute';
    protected $primaryKey = 'intBodyAttributeID';
    public $timestamps = false;
}
