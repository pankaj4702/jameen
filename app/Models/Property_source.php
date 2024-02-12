<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_source extends Model
{
    use HasFactory;

    protected $table = 'property_sources';

    protected $fillable = [
        'name',
        'category'
    ];

}
