<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
  public $table = 'cart_detail';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'cart_id',
    'product_id',
    'quantity',
    'total',
    'created_at',
    'updated_at'
  ];
  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }

  public function cart()
  {
    return $this->belongsTo(Cart::class, 'cart_id');
  }
}
