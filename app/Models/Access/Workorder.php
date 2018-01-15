<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Workorder extends Model implements AuditableContract
{
  use Auditable;
  public function items()
    {
        return $this->hasMany('App\Models\Access\item');
    }

  public function sales()
    {
        return $this->belongsTo('App\Models\Access\sales');
    }

  public function wotypes()
    {
        return $this->hasMany('App\Models\Access\Wotype');
    }
}
