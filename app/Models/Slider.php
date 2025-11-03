<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'title',
        'image',
        'btn1_text',
        'btn1_link',
        'btn2_text',
        'btn2_link',
        'is_active',
    ];
}
