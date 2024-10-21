<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'ReviewID';

    protected $fillable = [
        'ProductID',
        'UserID',
        'Rating',
        'Comment',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function user() {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}
