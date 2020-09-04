<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    public $timestamps = false;
    public $visible = ['user_id', 'superuser'];
    public $fillable = ['user_id', 'superuser'];
}
