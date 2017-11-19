<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Stocklist extends Model implements AuditableContract
{
  use Auditable;
    // public $fillable = ['partNo', 'stock_qad'];

    public function items()
      {
          return $this->hasMany('App\Models\Access\item');
      }
  //   public function getFile()
  //  {
  //      $file = Input::file('report');
  //      $filename = $this->doSomethingLikeUpload($file);
   //
  //     // Return it's location
  //      return $filename;
  //  }
}
