<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['codigo','nombre','proveedor'];
    protected $primaryKey = 'codigo';

    public function ingre() {
        return $this->hasMany('App\Ingrediente');
    }
    protected $table = 'ingrediente';
}
