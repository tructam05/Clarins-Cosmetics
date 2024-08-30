<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $table = 'category';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'name' ,
    'description',
    'created_at',
    'updated_at'
  ];
  public function product()
  {
    return $this->hasMany(Product::class);
  }
}

?>