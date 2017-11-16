<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Stockupdate extends Model implements AuditableContract
{
  use SoftDeletes;
  use Auditable;

  public function item()
    {
        return $this->belongsTo('App\Models\Access\item');
    }

}
