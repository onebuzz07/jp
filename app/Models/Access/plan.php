<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class plan extends Model implements AuditableContract
{

  use Auditable;
    // protected $table 	= 'sales';
    // public $primaryKey  = 'id';
}
