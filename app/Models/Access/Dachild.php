<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Dachild extends Model
{
  public function salesqad()
  {
      return $this->hasOne('App\Models\Access\Salesqad', 'id', 'salesqads_id');
  }

  public function da()
  {
      return $this->belongsTo('App\Models\Access\Das', 'das_id', 'id');
  }
}
