<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
  public $table = 'contact_us';
  protected $primarykey = 'id';
  public $timestamps = true;
  public $fillable = [
    'name',
    'email',
    'phone',
    'question',
    'created_at',
    'updated_at'
  ];
}
