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
        $condition = new Shipment(['name' => ' Przesyłka kurierska - przedpłata', 'shipPrice' => '17.99']);
        $condition->save();
        $condition = new Shipment(['name' => 'Przesyłka kurierska - pobranie', 'shipPrice' => '20.00']);
        $condition->save();
        $condition = new Shipment(['name' => 'List polecony - przedpłata', 'shipPrice' => '7.99']);
        $condition->save();
        $condition = new Shipment(['name' => 'Paczkomat', 'shipPrice' => '9.99']);
        $condition->save();
    }
}
