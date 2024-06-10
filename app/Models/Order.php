<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders_overview';
    protected $fillable = [
        'user_id',
        'cus_name',
        'cus_email',
        'cus_phone',
        'cus_address',
        'note',
        'total',
        'subtotal',
        'status',
    ];
    public function orderDetail():HasMany{
        return $this->hasMany(OderDetail::class, 'order_id','id');
    } 
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
