<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
  public $table = 'customer_order';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'customer_id',
    'payment',
    'status',
    'created_at',
    'updated_at'
  ];
}