<?php
//every sales order request

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class sales extends Model implements AuditableContract
{
  use SoftDeletes;
  use Auditable;

  protected $dates = ['deleted_at','datetime', 'deliverDate', 'Due_Date'];
  protected $table = 'sales';
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

    // public function requisites()
    // {
    //     return $this->hasMany('App\Models\Access\Requisite');
    // }
}
