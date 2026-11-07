<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // hasMany - обозначает "имеет много" (один продукт -> много позиций заказов)
    // Связь с моделью OrderList M:1
    public function orderlict()
    {
        return $this->hesMany(OrderList::class);
    }
}
