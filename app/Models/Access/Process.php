<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Process extends Model implements AuditableContract
{
  use SoftDeletes;
  use Auditable;

  protected $table = 'processes';
  protected $fillable= ['requisites_id','other_sub', 'other_data'];

  public function requisites()
    {
        return $this->belongsTo('App\Models\Access\Requisite', 'requisites_id');
    }
}
