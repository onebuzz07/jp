<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Salesqad extends Model implements AuditableContract
{
  use Auditable;

    protected $dates = ['deliverDate'];

    protected $casts = [
      'deliverDate' => 'date',

    ];
}