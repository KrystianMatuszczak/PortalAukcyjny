<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
      'buyer_id'
  ];

  public function products() {
    return $this->belongsToMany(Product::class);
  }
  
  public function buyer() {
    return $this->belongsTo(User::class);
  }
}
