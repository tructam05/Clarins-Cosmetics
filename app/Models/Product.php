<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $table = 'product';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'name' ,
    'price',
    'quantity',
    'short_description',
    'description',
    'ingredients',
    'category_id',
    'status',
    'created_at',
    'updated_at'
  ];
  public function images()
  {
    return $this->hasMany(ProductImage::class, 'product_id');
  }
  public function orderDetails()
  {
    return $this->hasMany(OrderDetail::class, 'product_id');
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  use HasFactory;

  public function image()
  {
    return $this->hasOne(ProductImage::class, 'product_id')->where('is_primary', 1);
  }
}

?>