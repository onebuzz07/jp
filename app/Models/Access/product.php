<?php
//Table related to products amendment form
namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class product extends Model implements AuditableContract
{
  use SoftDeletes;
  use Auditable;

  protected $dates = ['deleted_at','datetime','requiredDate'];

  public function items()
    {
        return $this->belongsTo('App\Models\Access\item');
    }

  public function sales()
    {
        return $this->belongsTo('App\Models\Access\sales');
    }

    public function fileupload()
    {
        return $this->hasMany('App\Models\Access\FileUpload', 'doc_id', 'paf_number');
    }

}
