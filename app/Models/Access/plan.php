<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class plan extends Model implements AuditableContract
{

  use Auditable;
  use Notifiable;

  public function routeNotificationForMail()
    {
        return $this->owner->email;
    }

}
