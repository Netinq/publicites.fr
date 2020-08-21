<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['surname', 'firstname', 'adress', 'cp', 'city', 'country'];
    protected $visible = ['surname', 'firstname', 'adress', 'cp', 'city', 'country'];
}
