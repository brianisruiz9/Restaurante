<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['codigo','nombre','valor'];
    protected $primaryKey = 'codigo';

    public function plato() {
        return $this->hasMany('App\Plato');
    }
    protected $table = 'plato';
}
