<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $table = 'cart';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'customer_id',
    'created_at',
    'updated_at'
  ];
  public function cartDetails()
  {
    return $this->hasMany(CartDetail::class);
  }
  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
}
