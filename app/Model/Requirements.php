<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requirements extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblrequirements';
    protected $primaryKey = 'intRequirementsID';
    public $timestamps = false;
}
