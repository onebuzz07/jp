<?php
//every sales order request

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Notifications\Notifiable;


class sales extends Model implements AuditableContract
{
  use SoftDeletes;
  use Auditable;
  use Notifiable;

  protected $dates = ['deleted_at','datetime', 'deliverDate', 'Due_Date'];
  protected $table = 'sales';

  public function salesqad()
  {
      return $this->hasOne('App\Models\Access\Salesqad');
  }
    public function items()
    {
        return $this->hasOne('App\Models\Access\item');
    }
    public function softcover()
    {
        return $this->hasMany('App\Models\Access\Softcover');
    }

    public function softcoverbw()
    {
        return $this->hasMany('App\Models\Access\Softcoverbw');
    }

    public function Overseasfb()
    {
        return $this->hasMany('App\Models\Access\Overseasfb');
    }

    public function Overseaswt()
    {
        return $this->hasMany('App\Models\Access\Overseaswt');
    }

    public function Boxes()
    {
        return $this->hasMany('App\Models\Access\Boxes');
    }

    public function Planning()
    {
        return $this->hasMany('App\Models\Access\Planning');
    }

    public function fileupload()
    {
        return $this->hasMany('App\Models\Access\FileUpload', 'doc_id', 'sco_number');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Access\Product');
    }

    public function productions()
    {
        return $this->hasMany('App\Models\Access\Production');
    }

    public function balances()
    {
        return $this->hasMany('App\Models\Access\Balance');
    }

    public function sheeting()
    {
        return $this->hasMany('App\Models\Access\Sheeting');
    }

    public function station()
    {
        return $this->hasMany('App\Models\Access\Station');
    }

    public function workorder()
    {
        return $this->hasOne('App\Models\Access\Workorder');
    }

    public function addstock()
    {
        return $this->hasMany('App\Models\Access\Addstock');
    }

    public function statusstock()
    {
        return $this->hasMany('App\Models\Access\Statusstock');
    }
}
