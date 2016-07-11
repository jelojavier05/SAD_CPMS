<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rank extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblrank';
    protected $primaryKey = 'intRankID';
    public $timestamps = false;
    
    public function ArmedService(){
        return $this->belongsTo('App\Model\ArmedService', 'intArmedServiceID', 'intArmedServiceID');
    }
}
