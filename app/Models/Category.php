<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Band;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function band(){
        return $this->hasOne(Band::class, 'category_id', 'id');
    }

}
