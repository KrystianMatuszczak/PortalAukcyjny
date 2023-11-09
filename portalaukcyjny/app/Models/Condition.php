<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'name'
    ];

    public function products()
  {
    return $this->belongsToMany(Product::class);
  }
}
