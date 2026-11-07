<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    // belongsTo - обозначает "принадлежит одному" (много списков заказов -> один заказ)
    // Связь с моделью Order 1:M
    public function order(){
        return $this->belongsTo(Order::class);
    }
    // belongsTo - обозначает "принадлежит одному" (много списков заказов -> один продукт)
    // Связь с моделью Product 1:M
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
