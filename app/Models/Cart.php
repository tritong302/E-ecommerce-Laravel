<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_color_id',
        'quantity'
    ];
    public function cartUser()
    {
        return $this->hasMany(User::class,'user_id','id');
    }
    public function cartProduct():belongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
