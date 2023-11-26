<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddressDetails extends Model
{
    use HasFactory;

    protected $fillable = [
      'firstName',
      'lastName',
      'address',
      'phoneNumber',
      'email'
  ];

  public function user() {
    return $this->hasOne(User::class);
  }
}
