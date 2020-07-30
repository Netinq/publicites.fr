<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name', 'firstname', 'adress', 'cp', 'city', 'country'];
    protected $visible = ['name', 'firstname', 'adress', 'cp', 'city', 'country'];
}
