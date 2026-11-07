<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // belongsTo - обозначает "принадлежит одному" (много заказов -> один клиент)
    // Связь с моделью Client M:1
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    // hasMany - обозначает - "имеется во многих" список заказов
    // Связь с моделью OrderList M:1
    public function orderlists() {
        return $this->hasMany(OrderList::class);
    }
}
