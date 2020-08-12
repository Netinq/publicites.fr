<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'link'];
    protected $visible = ['title', 'description', 'link'];
}
