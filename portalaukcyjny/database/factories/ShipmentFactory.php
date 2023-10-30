<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->word(100),
            'shipPrice' => $this->faker->randomFloat(2, 10, 100),
            'created_at'=>$this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
            'updated_at'=>$this->faker->dateTimeBetween(
                '- 4 weeks',
                '- 1 week',
            ),
            'deleted_at'=>rand(0,10)===0
                ?$this->faker->dateTimeBetween(
                    '- 1 week',
                    '+ 2 weeks',
                )
                : null
        ];
    }
}
