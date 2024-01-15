<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleList extends Model
{
    use HasFactory;
      protected $fillable = [
        'product_id',
        'table_id',
        'price',
        'amount',
        'total_price',
    ];
}