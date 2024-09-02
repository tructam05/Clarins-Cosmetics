<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
  public $table = 'reviews';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'product_id',
    'customer_id',
    'rating',
    'content',
    'created_at',
    'updated_at',
    'is_approved'
  ];

  public function customerId()
  {
    return $this->belongsTo(User::class,'customer_id');
  }
  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class, 'customer_id');
  }
}
