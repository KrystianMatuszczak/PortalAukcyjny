<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $condition = new Category(['name' => 'Elektronika']);
      $condition->save();
      $condition = new Category(['name' => 'Moda']);
      $condition->save();
      $condition = new Category(['name' => 'Dom']);
      $condition->save();
      $condition = new Category(['name' => 'Ogród']);
      $condition->save();
      $condition = new Category(['name' => 'Supermarket']);
      $condition->save();
      $condition = new Category(['name' => 'Dziecko']);
      $condition->save();
      $condition = new Category(['name' => 'Uroda']);
      $condition->save();
      $condition = new Category(['name' => 'Zdrowie']);
      $condition->save();
      $condition = new Category(['name' => 'Sport']);
      $condition->save();
      $condition = new Category(['name' => 'Rozrywka']);
      $condition->save();
      $condition = new Category(['name' => 'Kultura']);
      $condition->save();
      $condition = new Category(['name' => 'Motoryzacja']);
      $condition->save();
      $condition = new Category(['name' => 'Nieruchomości']);
      $condition->save();
      $condition = new Category(['name' => 'Kolekcje']);
      $condition->save();
      $condition = new Category(['name' => 'Sztuka']);
      $condition->save();
      $condition = new Category(['name' => 'Usługi']);
      $condition->save();
    }
}
