<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'code_voucher' => $this->faker->unique()->bothify('PROMO-####'), // contoh: PROMO-4839
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'img_poster' => $this->faker->word(),
            'is_header' => false,
            'header_position' => "none",
            'term_and_conditions' => $this->faker->words(),
            'discount' => $this->faker->randomNumber(),
            'quota' => $this->faker->numberBetween(10, 100),
            'used_quota' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
