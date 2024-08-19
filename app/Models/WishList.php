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
    'product_id'
  ];
}
