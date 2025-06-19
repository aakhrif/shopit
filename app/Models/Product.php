<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'sizes'
    ];

    protected $casts = [
        'sizes' => 'array',
        'price' => 'decimal:2'
    ];
}
