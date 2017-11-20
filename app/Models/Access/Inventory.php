<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Inventory extends Model implements AuditableContract
{
  use Auditable;
  public function items()
    {
        return $this->hasMany('App\Models\Access\item');
    }
}
