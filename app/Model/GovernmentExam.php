<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GovernmentExam extends Model
{

	use SoftDeletes;
    protected $table = 'tblgovernmentexam';
    protected $primaryKey = 'intGovernmentExamID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
