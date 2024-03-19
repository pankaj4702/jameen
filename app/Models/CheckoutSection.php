<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutSection extends Model
{
    use HasFactory;
    protected $fillable=[
        'main_heading',
        'description',
        'images',
        'city_id',
    ];
}
