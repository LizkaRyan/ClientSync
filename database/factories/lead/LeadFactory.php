<?php

namespace Database\Factories\lead;

use App\Models\Lead\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    protected $model = Lead::class;

    // Ajouter des paramètres à la méthode definition
    public function definition()
    {
        return [
            'name' => str_replace("'", "''", fake()->name()), // Nom aléatoire
            'phone' => fake()->phoneNumber(), // Numéro de téléphone aléatoire
            'status' => fake()->randomElement(['Pending', 'Completed', 'In Progress']), // Statut aléatoire
            'meeting_id' => str_replace("'", "''", fake()->unique()->uuid()), // ID de réunion unique (UUID)
            'google_drive' => fake()->numberBetween(0,1), // Indique si Google Drive est activé (1 ou 0)
            'google_drive_folder_id' => str_replace("'", "''", fake()->uuid()), // ID unique pour le dossier Google Drive
            'created_at' => fake()->dateTime(), // Date de création aléatoire
        ];
    }

    /**
     * Indicate the number of users for the user_id.
     *
     * @param int $lengthUser
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withParameter($lengthCustomer,$lengthUser)
    {
        return $this->state(function (array $attributes) use ($lengthUser,$lengthCustomer) {
            return [
                'customer_id' => fake()->numberBetween(43, 42+$lengthCustomer), // ID du client aléatoire
                'user_id' => fake()->numberBetween(53, 52+$lengthUser), // ID de l'utilisateur aléatoire
                'employee_id' => fake()->numberBetween(53, 52+$lengthUser), // ID de l'employé aléatoire
            ];
        });
    }
}
