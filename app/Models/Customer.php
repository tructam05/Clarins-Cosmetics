<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  public $table = 'customer';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'name',
    'avatar',
    'age',
    'phone',
    'email',
    'password',
    'remember_token',
    'address',
    'created_at',
    'updated_at'
  ];
  public function cart()
  {
    return $this->hasOne(Cart::class);
  }
}
