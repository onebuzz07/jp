<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Cust extends Model implements AuditableContract
{
  use Auditable;

  // public function das()
  // {
  //     return $this->hasMany('App\Models\Access\Das', 'custs_id');
  // }

  public function salesqad()
    {
        return $this->belongsTo('App\Models\Access\Salesqad');
    }

}
