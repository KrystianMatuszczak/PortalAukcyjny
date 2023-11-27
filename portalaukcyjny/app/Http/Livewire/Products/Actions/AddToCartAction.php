<?php

namespace App\Http\Livewire\Products\Actions;

use App\Facades\CartService;
use LaravelViews\Views\View;
use LaravelViews\Actions\Action;


class AddToCartAction extends Action
{
    public $title = '';
    public $icon = 'shopping-cart';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('Dodaj do koszyka');
    }

    public function handle($model, View $view)
    {
        CartService::add($model->id);
        $view->notification()->success(
            $title = __('Pomyslnie dodano do koszyka'),
            $description = __('Produkt zostal dodany do koszyka, przejdź dalej aby zrealizować zamówienie',[
                'name' => $model->name]
                )
            );
            $view->emit('cartUpdated');
    }
    public function renderIf($item, View $view)
    {
        return request()->user()->can('addToCart', $item);
    }
}
