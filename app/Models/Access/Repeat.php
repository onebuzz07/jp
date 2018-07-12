<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Repeat extends Model implements AuditableContract
{
  // use SoftDeletes;
  use Auditable;

  protected $dates = ['deleted_at','datetime', 'deliverDate'];
  protected $primaryKey = 'id';
  // protected $primary_key = ['deleted_at'];

  public function items()
    {
        return $this->belongsTo('App\Models\Access\item');
    }

    public function fileupload()
    {
        return $this->hasMany('App\Models\Access\FileUpload', 'doc_id', 'rsc_number');
    }
}
