<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmVisit extends Model
{
     use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'background_color',
    ];
}
