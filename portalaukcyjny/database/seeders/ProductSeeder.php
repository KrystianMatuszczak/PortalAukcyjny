<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = Category::all();
        $shipments = Shipment::all();

        Product::factory()
            ->count(15)
            ->create()
            ->each(function ($product) use ($categories)
            {
                $product->categories()->attach(
                    $categories->random(rand(1, 3))
                    ->pluck('id')
                    ->toArray()
                );
            });
            
    }
}
