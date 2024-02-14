<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role',
        'image',
        'status'
    ];
}
