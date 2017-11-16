<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class FileUpload extends Model implements AuditableContract
{
  use Auditable;
  
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
