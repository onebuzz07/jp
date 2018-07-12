<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Invqad extends Model implements AuditableContract
{
    use Auditable;

    public function item()
    {
        return $this->hasMany('App\Models\Access\item');
    }

    public function salesqad()
    {
        return $this->belongsTo('App\Models\Access\Salesqad', 'Item_Number','items_number');
      }
}
