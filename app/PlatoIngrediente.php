<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlatoIngrediente extends Model
{
    protected $fillable = ['id','codPlato','codIngrediente','cantidad'];
    protected $primaryKey = 'id';

    public function platoIngrediente() {
        return $this->hasMany('App\PlatoIngrediente');
    }
    protected $table = 'platoingrediente';
}
