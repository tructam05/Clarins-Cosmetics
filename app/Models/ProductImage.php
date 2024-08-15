<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
  public $table = 'product_image';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'product_id',
    'path',
    'is_primary'
  ];
}

?>