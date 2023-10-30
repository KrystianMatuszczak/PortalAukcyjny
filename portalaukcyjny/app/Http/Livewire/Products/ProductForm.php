<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;

    public Product $product;
    public $categoriesIds;
    public Bool $editMode;
    public $image;

    public $imageUrl;
    public $imageExists;

    public function rules()
    {
        return[
            'product.name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'product.description' => [
                'nullable',
                'string',
                'max:190',
            ],
            'categoriesIds' => [
                'required',
                'array',
            ],
            'product.price' => [
                'required',
                'numeric',
                'gt:0',
                'max:100000',
            ],
            'product.amount' => [
                'required',
                'numeric',
                'gt:0',
                'max:100000',
            ],
            'product.localization' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'image' => [
                'nullable',
                'image',
                'max:1024',
            ],
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('Nazwa Modelu')),
            'description' => Str::lower(__('Opis')),
            'categoriesIds' => Str::lower(__('Kategorie')),
            'price' => Str::lower(__('Cena')),
            'amount' => Str::lower(__('Ilość')),
            'localization' => Str::lower(__('Lokalizacja')),
            'images' => Str::lower(__('Obraz')),
        ];
    }

    public function mount(Product $product, Bool $editMode)
    {
        $this->product = $product;
        $this->categoriesIds = $this->product->categories->toArray();
        $this->imageChange();
        $this->editMode = $editMode;
    }
    
    public function render()
    {
        return view('livewire.products.product-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if($this->editMode) {
            $this->authorize('update', $this->product);
        } else {
            $this->authorize('create', Product::class);
        }
        $this->validate();

        $image = $this->image;
        $categoriesIds = $this->categoriesIds;
        $product = $this->product;
        DB::transaction(function() use ($product, $categoriesIds, $image)
        {
            $product->save();
            if($image !== null)
            {
                $product->image = $product->id
                    . '.' . $this->image->getclientOriginalExtension();
                $product->save();
            }
            $product->categories()->sync($categoriesIds);
        });

        if($this->image !== null)
        {
            $this->image->storeAs(
                '',
                $this->product->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode
                ? __('Zaktualizowano')
                : __('Utworzono'),
            $description = $this->editMode
                ? __('Zaktualizowano  ', ['name' => $this->product->name])
                : __('Dodano ', ['name' => $this->product->name])
        );
        $this->editMode = true;
        $this->imageChange();
    }

    public function imageChange()
    {
        $this->imageExists = $this->product->imageExists();
        $this->imageUrl = $this->product->imageUrl();
    }

    public function deleteImageConfirm()
    {
        $this->dialog()->confirm([
            'title' => __('Usuwanie'),
            'description' => __('Czy usunac obraz?',
        ['name' => $this->product->name
        ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('Tak'),
                'method' => 'deleteImage',
            ],
            'reject' => [
                'label' => __('Nie'),
            ]
        ]);
    }

    public function deleteImage()
    {
        if(Storage::disk('public')->delete($this->product->image))
        {
            $this->product->image = null;
            $this->product->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('Usuwanie'),
                $description = __('Usunieto pomyslnie',[
                    'name' => $this->product->name
                ])
                );
        }
    }
}
