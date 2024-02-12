<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_status extends Model
{
    use HasFactory;

    protected $table = 'property_status';

    protected $fillable = [
        'name',
        'category'
    ];
}
