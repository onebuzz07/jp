<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Bosch extends Model implements AuditableContract
{
  use Auditable;

  public function invqad()
  {
      return $this->belongsTo('App\Models\Access\Invqad', 'part_no','items_number');
  }

  public function salesqad()
  {
      return $this->belongsTo('App\Models\Access\Salesqad', 'part_no', 'Item_Number');
  }
    //
}
