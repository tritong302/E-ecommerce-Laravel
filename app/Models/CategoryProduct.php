<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'category_product';
    protected $fillable = [
        'cate_name',
        'cate_slug',
        'cate_banner',
        'parent_id',
        'status'
    ];
   public function product()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
