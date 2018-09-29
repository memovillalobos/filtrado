<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $table = 'tbl_facturas';
  public $timestamps = false;

  public function client()
  {
    return $this->belongsTo('App\Client', 'cliente_id');
  }

  public function payments()
  {
    return $this->hasMany('App\Payment', 'factura_id');
  }

}
