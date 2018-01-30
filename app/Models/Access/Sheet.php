<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Sheet extends Model implements AuditableContract
{
    use Auditable;

    public function sheeting()
    {
        return $this->hasMany('App\Models\Access\Sheeting');
    }
}
