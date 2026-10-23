<?php

namespace Database\Factories;

use App\Models\artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class artikelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'isi' => $this->faker->text(),
            'status' => $this->faker->randomElement(['draft', 'terbit']),
            'user_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
