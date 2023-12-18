<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{ 
    public function index()
    {
        return view(
            'users.index', 
            [
                'users' => User::with('roles')->get()
            ]
            );
    }

    public function purchases() {
      return view('users.purchases', [
        'purchases' => Purchase::where('buyer_id', Auth::user()->id)->get()
      ]);
    }
}
