<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $table = 'cart';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'customer_id'
  ];
  public function cart_details()
  {
    return $this->hasMany(CartDetail::class, 'cart_id');
  }
  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
}
