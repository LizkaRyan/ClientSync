<?php

namespace Database\Factories\User;

use App\Models\User\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'first_name' => str_replace("'", "''", fake()->firstName()), // Prénom aléatoire
            'last_name' => str_replace("'", "''", fake()->lastName()), // Nom aléatoire
            'phone' => fake()->phoneNumber(), // Numéro de téléphone aléatoire
            'department' => str_replace("'", "''", fake()->word()), // Un mot aléatoire pour le département
            'salary' => fake()->randomFloat(2, 30000, 120000), // Salaire entre 30,000 et 120,000
            'status' => fake()->randomElement(['Active', 'Inactive']), // Statut aléatoire
            'oauth_user_image_link' => fake()->imageUrl(200, 200, 'people'), // Lien vers une image
            'user_image' => fake()->imageUrl(200, 200, 'people'), // Image en BLOB, laissée vide pour cette génération
            'bio' => fake()->text(200), // Biographie texte
            'youtube' => fake()->url(), // URL YouTube aléatoire
            'twitter' => fake()->url(), // URL Twitter aléatoire
            'facebook' => fake()->url(), // URL Facebook aléatoire
            'user' => null, // Doit être fourni si nécessaire ou généré dans une logique spécifique
            'country' => str_replace("'", "''", fake()->country()), // Pays aléatoire
            'position' => str_replace("'", "''", fake()->jobTitle()), // Titre de poste aléatoire
            'address' => str_replace("'", "''", fake()->address()), // Adresse aléatoire
        ];
    }

    /**
     * Indicate the number of users for the user_id.
     *
     * @param int $lengthUser
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withUserLength(int $lengthUser)
    {
        return $this->state(function (array $attributes) use ($lengthUser) {
            return [
                'user_id' => fake()->numberBetween(53, 52+$lengthUser),  // Custom user_id range
            ];
        });
    }
}
