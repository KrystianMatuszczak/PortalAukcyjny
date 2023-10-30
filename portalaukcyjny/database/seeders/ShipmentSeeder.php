<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("resources/csv/shipment.csv"), 'r');

        $firstLine = false;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Shipment::create(
                    [
                        'name' => $data['0'],
                        'shipPrice' => $data['1']
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
