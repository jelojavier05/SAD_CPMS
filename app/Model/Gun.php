<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gun extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblgun';
    protected $primaryKey = 'intGunID';
    public $timestamps = false;
	
}
