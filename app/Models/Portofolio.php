<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portofolio extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
    ];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
