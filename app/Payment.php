<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $connection = 'payments_connection';
    protected $table = 'tbl_pagos';
    public $timestamps = false;
}
