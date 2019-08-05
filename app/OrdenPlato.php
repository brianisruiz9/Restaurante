<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPlato extends Model
{
    protected $fillable = ['id','numOrden','codPlato','cantidad','valor'];
    protected $primaryKey = 'id';

    public function ordenplato() {
        return $this->hasMany('App\OrdenPlato');
    }
    protected $table = 'ordenplato'; 
}
