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
  public function customerOrder()
    {
        return $this->belongsTo(CustomerOrder::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');

    }
}
