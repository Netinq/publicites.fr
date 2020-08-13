<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    use SoftDeletes;

    protected $fillable = ['departement_id', 'title', 'description', 'link', 'image'];
    protected $visible = ['departement_id', 'title', 'description', 'link', 'image'];
}
