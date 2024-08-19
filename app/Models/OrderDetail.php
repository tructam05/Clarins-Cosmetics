<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  public $table = 'order_detail';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'order_id',
    'product_id',
    'quantity',
    'price',
    'total',
    'created_at',
    'updated_at'
  ];
}
