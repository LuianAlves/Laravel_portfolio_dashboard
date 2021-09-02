<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'framework',
    ];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
