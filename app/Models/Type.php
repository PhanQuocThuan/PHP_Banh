<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    
    protected $table = 'types';
    protected $primaryKey = 'TypeID';

    protected $fillable = [
        'Name',
        'Description',
    ];

    public function products() {
        return $this->hasMany(Product::class, 'TypeID', 'TypeID');
    }
}
