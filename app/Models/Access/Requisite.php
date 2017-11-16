<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Requisite extends Model implements AuditableContract
{
  use SoftDeletes;
  use Auditable;
  protected $table = 'requisites';
  protected $dates = ['requiredDate'];

  public function processes()
    {
        return $this->hasMany('App\Models\Access\Process' , 'requisites_id');
    }

    public function fileupload()
    {
        return $this->hasMany('App\Models\Access\FileUpload', 'doc_id', 'SRO_number');
    }
}
