<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Das extends Model
{
  // protected $casts = ['stand_by'];
  protected $date = ['stand_by'];

  public function cust()
  {
      return $this->belongsTo('App\Models\Access\Cust', 'custs_id');
  }

  public function salesqad()
  {
      return $this->belongsTo('App\Models\Access\Salesqad', 'Item_Number', 'item_number');
  }

  public function dachilds()
  {
      return $this->hasMany('App\Models\Access\Dachild');
  }
}
