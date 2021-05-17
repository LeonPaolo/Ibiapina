<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
