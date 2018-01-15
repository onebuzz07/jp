<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Wotype extends Model
{
  public function workorder()
    {
        return $this->belongsTo('App\Models\Access\Workorder');
    }
}
