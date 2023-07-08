<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\Client;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    protected $model = Quote::class;

    public function definition()
    {
        $clientId = Client::query()->inRandomOrder()->first()->id;
        $statusId = Status::query()->inRandomOrder()->first()->id;

        return [
            'client_id' => $clientId,
            'status_id' => $statusId,
            'currency' => $this->faker->randomElement(['USD', 'GBP', 'EUR']),
            'title' => $this->faker->sentence,
            'number' => $this->faker->unique()->numberBetween(10000, 99999),
        ];
    }
}
