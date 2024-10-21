<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';

    protected $fillable = [
        'TotalAmount',
        'Status',
        'UserID',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    public function items() {
        return $this->hasMany(OrderItem::class, 'OrderID', 'OrderID');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'OrderID', 'OrderID');
    }
}
