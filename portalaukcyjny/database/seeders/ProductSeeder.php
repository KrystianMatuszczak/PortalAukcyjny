<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = Condition::all();
        $categories = Category::all();
        Product::factory()
            ->count(15)
            ->create()
            ->each(function ($product) use ($categories, $conditions)
            {
                $product->categories()->attach(
                    $categories->random(rand(1, 3))
                    ->pluck('id')
                    ->toArray()
                );
                $product->conditions()->attach(
                    $conditions->random(rand(1, 1))
                    ->pluck('id')
                    ->toArray()
                );
            });
            
            
            
    }
}
