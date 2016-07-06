<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardGovernmentExam extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tblguardgovernmentexam';
    protected $primaryKey = 'intGuardGovernmentExamID';
    public $timestamps = false;
    
    public function Guard(){
        return $this->belongsTo('App\Model\Guard', 'intGuardID', 'intGuardID');
    }
    
    public function GovernmentExam(){
        return $this->belongsTo('App\Model\GovernmentExam', 'intGovernmentExamID', 'intGovernmentExamID');
    }
}




