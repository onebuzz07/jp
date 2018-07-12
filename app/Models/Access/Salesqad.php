<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Salesqad extends Model implements AuditableContract
{
  use Auditable;

    // protected $dates = ['Order_Date'];

    // protected $casts = [ 'Order_Date' ];

     protected $nullable = ['Order_Date'];

    public function dachild()
    {
        return $this->belongsTo('App\Models\Access\dachild', 'salesqads_id', 'id');
    }

    public function bosch()
    {
        return $this->hasOne('App\Models\Access\Bosch', 'part_no', 'Item_Number');
    }

    public function das()
    {
        return $this->hasMany('App\Models\Access\Das', 'item_number', 'Item_Number');
    }

    public function item()
    {
        return $this->hasOne('App\Models\Access\item');
    }

    public function invqads()
    {
        return $this->hasMany('App\Models\Access\Invqad', 'items_number', 'Item_Number');
    }

    public function sales()
    {
        return $this->belongsTo('App\Models\Access\sales');
    }
    public function cust()
      {
          return $this->hasOne('App\Models\Access\Cust');
      }
}
