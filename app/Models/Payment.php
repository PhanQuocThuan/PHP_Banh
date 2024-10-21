<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'PaymentID';

    protected $fillable = [
        'OrderID',
        'PaymentMethod',
        'PaymentStatus',
        'PaymentDate',
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'OrderID', 'OrderID');
    }
}
