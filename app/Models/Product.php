<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use HasFactory;
    protected $fillable = ['product_code', 'product_name', 'description', 'warranty_start_date', 'warranty_end_date', 'warranty_status'];
}
