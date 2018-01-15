<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
  public function production()
  {
      return $this->belongsTo('App\Models\Access\Production');
  }
  public function sales()
  {
      return $this->belongsTo('App\Models\Access\sales', 'sales_id');
  }

}
