<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
=======
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Default password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
=======
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
}
