<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['emp_id', 'emp_name', 'ip_address'];
}
