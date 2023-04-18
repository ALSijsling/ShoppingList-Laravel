<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'Category', 'Category');
    }
}
