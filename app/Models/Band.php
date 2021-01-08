<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'url', 'image', 'category_id',
    ];

    public function Category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
