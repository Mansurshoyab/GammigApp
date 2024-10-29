<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'logo',
        'favicon',
        'email',
        'phone',
        'telephone',
        'webSite',
        'facebook',
        'youtube',
        'linkedine',
        'instagram',
        'address',
        'map',
    ];
}
