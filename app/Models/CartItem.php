<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $primaryKey = 'CartItemID';

    protected $fillable = [
        'CartID',
        'ProductID',
        'Quantity',
        'UnitPrice',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class, 'CartID', 'CartID');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }
}
