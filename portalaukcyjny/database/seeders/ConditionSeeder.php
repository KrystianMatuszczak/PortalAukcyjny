<?php

namespace Database\Seeders;

use App\Models\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $condition = new Condition(['name' => 'Nowy']);
      $condition->save();

      $condition = new Condition(['name' => 'Używany - Jak Nowy']);
      $condition->save();

      $condition = new Condition(['name' => 'Używany - Bardzo Dobry']);
      $condition->save();

      $condition = new Condition(['name' => 'Używany - Dobry']);
      $condition->save();

      $condition = new Condition(['name' => 'Używany - Akceptowalny']);
      $condition->save();

      $condition = new Condition(['name' => 'Zepsuty']);
      $condition->save();
    }
}
