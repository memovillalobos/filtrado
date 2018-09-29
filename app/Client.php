<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'tbl_clientes';
    public $timestamps = false;

    function invoices()
    {
      return $this->hasMany('App\Invoice', 'cliente_id');
    }
}
