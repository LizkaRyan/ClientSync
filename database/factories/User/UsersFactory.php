<?php

namespace Database\Factories\User;

use App\Models\User\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsersFactory extends Factory
{

    protected $model=Users::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hire_date = fake()->date('Y-m-d H:i:s','now');
        $updated_at = fake()->date('Y-m-d H:i:s','now');
        $created_at = fake()->date('Y-m-d H:i:s','now');
        return [
            'email' => str_replace("'", "''", fake()->unique()->safeEmail()),
            'password' => "ifqsdlkfjotilksdoi",
            'created_at' => $created_at,
            'hire_date' => $hire_date,
            'updated_at' => $updated_at,
            'username' => str_replace("'", "''", fake()->unique()->username()),
            'status' => fake()->randomElement(['active', 'inactive']),
            'token' => "fldkgrizuhksnjksdkfs-65fsd--sdfsjdkfhsdf",
            'is_password_set' => fake()->numberBetween(0,1),
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
}
