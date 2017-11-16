<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
  public function sales()
  {
      return $this->belongsTo('App\Models\Access\sales');
  }
}
