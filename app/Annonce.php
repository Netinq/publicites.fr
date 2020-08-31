<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    use SoftDeletes;

    protected $fillable = ['user_id', 'departement_id', 'title', 'description', 'link', 'image'];
    protected $visible = ['id','departement_id', 'title', 'description', 'link', 'image'];
    
}
