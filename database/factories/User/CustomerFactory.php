<?php

namespace Database\Factories\User;

use App\Models\User\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    // Ajouter des paramètres à la méthode definition
    public function definition()
    {
        return [
            'name' => str_replace("'", "''", fake()->name()),
            'address' => str_replace("'", "''", fake()->address()),
            'city' => str_replace("'", "''", fake()->city()),
            'state' => str_replace("'", "''", fake()->state()),
            'phone' => fake()->phoneNumber(),
            'country' => str_replace("'", "''", fake()->country()),
            'description' => str_replace("'", "''", fake()->text()),
            'position' => str_replace("'", "''", fake()->jobTitle()),
            'twitter' => fake()->url(),
            'facebook' => fake()->url(),
            'youtube' => fake()->url(),
            'created_at' => fake()->dateTimeThisDecade(),
            'email' => str_replace("'", "''", fake()->unique()->safeEmail()),
            'profile_id' => null, // Utiliser l'ID du profil sélectionné
            'user_id' => null // Utiliser l'ID de l'utilisateur sélectionné
        ];
    }

    /**
     * Indicate the number of users for the user_id.
     *
     * @param int $lengthUser
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withParameter($lengthProfile, $lengthUser)
    {
        return $this->state(function (array $attributes) use ($lengthUser,$lengthProfile) {
            return [
                'profile_id' => fake()->numberBetween(1, $lengthProfile), // Utiliser l'ID du profil sélectionné
                'user_id' => fake()->numberBetween(1,$lengthUser)  // Custom user_id range
            ];
        });
    }
}
