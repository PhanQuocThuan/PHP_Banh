<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'ProductID';

    protected $fillable = [
        'Name',
        'Description',
        'Img',
        'Price',
        'Stock',
        'TypeID',
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'TypeID', 'TypeID');
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class, 'ProductID', 'ProductID');
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class, 'ProductID', 'ProductID');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'ProductID', 'ProductID');
    }
}
