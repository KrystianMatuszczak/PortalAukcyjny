<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Model\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return view('cart.index');
    }

}