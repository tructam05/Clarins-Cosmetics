<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
  public $table = 'wishlist';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'customer_id',
    'product_id',
    'created_at',
    'updated_at'
  ];

  public function customerId()
  {
    return $this->belongsTo(User::class, 'customer_id');
  }
  public function productId()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
}
