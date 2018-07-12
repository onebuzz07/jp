<?php
//Item that invovle in the sales order form
namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class item extends Model implements AuditableContract

{
  use SoftDeletes;
  use Auditable;

  // public function invqads()
  //   {
  //       return $this->hasMany('App\Models\Access\Invqad');
  //   }

  public function sales()
    {
        return $this->belongsTo('App\Models\Access\sales');
    }

  public function products()
    {
        return $this->hasMany('App\Models\Access\product');
    }

    public function repeats()
      {
          return $this->hasOne('App\Models\Access\Repeat');
      }

    public function Stockupdates()
      {
          return $this->hasMany('App\Models\Access\Stockupdate');
      }

    public function stocklist()
      {
          return $this->belongsTo('App\Models\Access\Stocklist');
      }

    public function Workorder()
      {
          return $this->belongsTo('App\Models\Access\Workorder');
      }
    public function Salesorder()
      {
          return $this->belongsTo('App\Models\Access\Salesorder');
      }

    public function Purchaseorder()
      {
          return $this->belongsTo('App\Models\Access\Purchaseorder');
      }
    public function Stockupdatepowo()
      {
          return $this->hasMany('App\Models\Access\Stockupdatepowo');
      }
    public function sheeting()
      {
          return $this->hasMany('App\Models\Access\Sheetings');
      }
    public function balance()
      {
          return $this->hasMany('App\Models\Access\Balance');
      }

    public function delivery()
      {
          return $this->belongsTo('App\Models\Access\sales');
      }
    // public function salesqad()
    //   {
    //       return $this->belongsTo('App\Models\Access\Salesqad');
    //   }
}
