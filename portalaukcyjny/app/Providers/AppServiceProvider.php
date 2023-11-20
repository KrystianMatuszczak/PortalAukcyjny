<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Http\Livewire\Cart\CartStep;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\Cart\DeliveryStep;
use App\Http\Livewire\Cart\ConfirmOrderStep;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('cart-step', CartStep::class);
        Livewire::component('delivery-step', DeliveryStep::class);
        Livewire::component('confirm-order-step', ConfirmOrderStep::class);
    }
}
