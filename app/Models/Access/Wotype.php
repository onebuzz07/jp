<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Wotype extends Model implements AuditableContract
{
  use Auditable;

  public function workorder()
    {
        return $this->belongsTo('App\Models\Access\Workorder');
    }
}
