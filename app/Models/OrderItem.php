<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $table = 'order_items';
    protected $primaryKey = 'OrderItemID';

    protected $fillable = [
        'OrderID',
        'ProductID',
        'Quantity',
        'UnitPrice',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'OrderID', 'OrderID');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }
}
