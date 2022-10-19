<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            "item_name" => fake()->name(),
            "amount" => rand(1, 10),
            "price_per_unit" => rand(100, 400),
            "discount_per_unit" => rand(100, 200),
            "user_id" => rand(62, 71),
            "image_url"=>"http://localhost:8000/storage/13/Screenshot-from-2020-04-08-04-37-22.png",
            "created_at" => now(),
            "updated_at" => now(),
            "order_id" => Str::random(6),
            "status"=>"pending"
        ];
    }
}
