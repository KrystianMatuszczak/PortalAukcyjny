<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('products.index');
    }
    public function addToCart(User $user, Product $product)
    {
        return $user->can('products.create') && $product->user_id !== Auth::user()->id;
    }
    public function manage(User $user)
    {
        return $user->can('products.manage');
    }

    public function create(User $user)
    {
        return $user->can('products.manage') || $user->can('products.create');
    }

    public function update(User $user, Product $product)
    {
        return ($product->deleted_at === null
            && $user->can('products.manage'))
            || ($product->deleted_at === null
            && $user->can('products.create')
            && $product->user_id === Auth::user()->id);
        
    }

    public function delete(User $user, Product $product)
    {
        return ($product->deleted_at === null
            && $user->can('products.manage'))
            || ($product->deleted_at === null
            && $user->can('products.create')
            && $product->user_id === Auth::user()->id);;
        
    }

    public function restore(User $user, Product $product)
    {
        return $product->deleted_at !== null
            && $user->can('products.manage');
        
    }
}
