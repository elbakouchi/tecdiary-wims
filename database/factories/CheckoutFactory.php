<?php

namespace Database\Factories;

use App\Models\Checkout;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckoutFactory extends Factory
{
    protected $model = Checkout::class;

    public function definition()
    {
        return [
            'date'             => $this->faker->dateTimeBetween('-3 months'),
            'hash'             => $this->faker->randomKey(),
            'reference'        => $this->faker->ean13,
            'draft'            => $this->faker->boolean,
            'contact_id'       => 1,
            'warehouse_id'     => 1,
            'user_id'          => 1,
            'recurring_id'     => null,
            'account_id'       => 1,
            'details'          => $this->faker->paragraph,
            'extra_attributes' => null,
            'approved_at'      => null,
        ];
    }
}
