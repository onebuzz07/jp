<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Station extends Model implements AuditableContract
{
  use Auditable;
  public function production()
  {
      return $this->belongsTo('App\Models\Access\Production');
  }
  public function sales()
  {
      return $this->belongsTo('App\Models\Access\sales', 'sales_id');
  }

}
