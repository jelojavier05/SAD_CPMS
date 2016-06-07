<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TypeOfContract extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'tbltypeofcontract';
    protected $primaryKey = 'intTypeOfContractID';
    public $timestamps = false;
    
}
