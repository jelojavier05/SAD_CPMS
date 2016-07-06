<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'tblaccount';
    protected $primaryKey = 'intAccountID';
    
    public function Guard(){
        return $this->belongsTo('App\Model\Guard', 'intGuardID', 'intGuardID');
    }
    
}
