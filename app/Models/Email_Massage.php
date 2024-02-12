<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email_Massage extends Model
{
    use HasFactory;
    protected $table = 'email_messages';
    Protected $fillable=[
        'email_message',
        'status',
    ];
}
