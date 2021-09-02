<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sort_description',
        'long_description',
        'sub_description',
        'long_description_sec',
    ];
}
