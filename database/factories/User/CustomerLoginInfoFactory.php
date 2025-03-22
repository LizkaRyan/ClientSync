<?php

namespace Database\Factories\User;

use App\Models\User\CustomerLoginInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerLoginInfoFactory extends Factory
{
    protected $model = CustomerLoginInfo::class;

    public function definition()
    {
        return [
            'password' => str_replace("'", "''", bcrypt(fake()->password())), // Génère un mot de passe hashé
            'username' => str_replace("'", "''", fake()->unique()->userName()), // Génère un nom d'utilisateur unique
            'token' => str_replace("'", "''", fake()->unique()->uuid()), // Génère un UUID unique pour le token
            'password_set' => fake()->numberBetween(0,1), // Génère un booléen (0 ou 1)
        ];
    }
}
