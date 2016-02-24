<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GovernmentExam extends Model
{
    protected $table = 'tblgovernmentexam';
    protected $primaryKey = 'intGovernmentExamID';
    public $timestamps = false;
}
