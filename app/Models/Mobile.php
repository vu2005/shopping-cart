<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    protected $fillable = ['mobile_name', 'description', 'maker', 'price', 'mobile_image'];
}
