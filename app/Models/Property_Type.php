<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_Type extends Model
{
    use HasFactory;

    protected $table = 'property__types';
    protected $fillable = [
        'name',
        'category',
        'configuration',
    ];
}
