<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_web_history extends Model
{
    protected $table = 'employee_web_history';

    protected $fillable = ['ip_address','url', 'date'];
}
