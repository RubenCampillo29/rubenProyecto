<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

   //Relación uno a muchos

   public function facturas(){

     return $this->hasMany('App\Models\Factura');

   }
   

}
