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
      $csvFile = fopen(base_path("resources/csv/category.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Category::create(
                    [
                        'name' => $data['0']
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
