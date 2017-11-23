<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Planning extends Model
{
  //use SoftDeletes;
  //use Auditable;

  protected $dates = ['datetime', 'deliverDate'];
  public function sales()
  {
      return $this->belongsTo('App\Models\Access\sales');
  }
}
