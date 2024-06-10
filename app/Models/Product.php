<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable =[
      'id',
      'name',
      'slug',
      'short_desc',
        'image',
        'regular_price',
        'sale_price',
        'status',
        'description',
        'quantity',
        'trending',
        'featured',
        'best_seller',
        'category_id',
        'manufacturers_id',

    ];
    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class,'category_id','id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productColor()
    {
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
    public function products()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'total');
    }
}
