<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'about_text',
        'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'youtube',
        'whatsapp',
    ];
}
