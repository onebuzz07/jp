<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class FileUpload extends Model implements AuditableContract
{
  use Auditable;
  use SoftDeletes;

  protected $guarded = ['id'];

  // public function sales()
  // {
  //     return $this->belongsTo('App\Models\Access\sales');
  // }
  // public function products()
  // {
  //     return $this->belongsTo('App\Models\Access\product');
  // }
  // public function repeats()
  // {
  //     return $this->belongsTo('App\Models\Access\Repeat');
  // }
}
