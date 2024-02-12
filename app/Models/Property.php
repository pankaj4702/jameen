<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_category','features','feature_image','property_name','area','description', 'property_status', 'property_source','configuration','category_status','property_location','price','pin_code','images','post_user',
    ];
}
