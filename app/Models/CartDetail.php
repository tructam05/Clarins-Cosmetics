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
    'price'
  ];
}
