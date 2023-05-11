<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa con cliente

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    //Relacion uno a muchos inversa con user
    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
