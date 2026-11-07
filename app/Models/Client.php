<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // belongToMany - Связь многие ко многим
    // hasOne - Связь один ко одному
    // hasMany, belongsTo - Связь один ко многим



    // hasMany - обозначает "имеет много" (один клиент -> множество заказов)
    // Связь с моделью Order 1:M
    public function order(){
        return $this->hasMany(Order::class);
    }
}
