<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// TODO: filename upper case first (Grocery ipv grocery)
class Grocery extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['product', 'category', 'quantity', 'price'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category', 'category');
    }
}
