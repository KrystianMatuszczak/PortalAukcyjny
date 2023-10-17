<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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

    public function manage(User $user)
    {
        return $user->can('products.manage');
    }

    public function create(User $user)
    {
        return $user->can('products.manage');
    }

    public function update(User $user, Product $product)
    {
        return $product->deleted_at === null
            && $user->can('products.manage');
        
    }

    public function delete(User $user, Product $product)
    {
        return $product->deleted_at === null
            && $user->can('products.manage');
        
    }

    public function restore(User $user, Product $product)
    {
        return $product->deleted_at !== null
            && $user->can('products.manage');
        
    }
}
