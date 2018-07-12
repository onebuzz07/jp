<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Addstock extends Model
{
  public function prodstructs()
    {
        return $this->hasMany('App\Models\Access\Prodstruct', 'items_number', 'items_number');
    }

  public function sales()
    {
        return $this->belongsTo('App\Models\Access\sales');
    }
}
