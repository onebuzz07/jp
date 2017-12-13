<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Balance extends Model implements AuditableContract
{
    use Auditable;

    public function sales()
    {
        return $this->belongsTo('App\Models\Access\sales');
    }
}
