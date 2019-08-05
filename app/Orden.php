<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
   protected $fillable = ['numero','fecha','NumMesa','estado'];
    protected $primaryKey = 'numero';

    public function orden() {
        return $this->hasMany('App\Orden');
    }
    protected $table = 'orden'; 
}
