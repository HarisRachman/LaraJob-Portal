<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Job()
    {
        return $this->hasMany(Job::class, 'category_id');
    }
}
