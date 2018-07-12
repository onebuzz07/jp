<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Prodstruct extends Model
{
  public function addstock()
    {
        return $this->belongsTo('App\Models\Access\Addstock', 'items_number', 'items_number');
    }

}
