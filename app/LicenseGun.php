<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseGun extends Model
{
    protected $table = 'tbllicensegun';
    protected $primaryKey = 'intLicenseGunID';
    public $timestamps = false;
}
