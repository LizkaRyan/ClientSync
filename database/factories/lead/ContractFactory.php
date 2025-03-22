<?php

namespace Database\Factories\lead;

use App\Models\Lead\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    // Ajouter des paramètres à la méthode definition
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => str_replace("'", "''", fake()->sentence(3)), // Génère un sujet aléatoire
            'status' => fake()->randomElement(['Pending', 'Active', 'Completed', 'Cancelled']), // Statut aléatoire
            'description' => str_replace("'", "''", fake()->paragraph(3)), // Description aléatoire
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // Date de début aléatoire
            'end_date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Date de fin aléatoire
            'amount' => fake()->numberBetween(1000, 50000), // Montant aléatoire
            'google_drive' => fake()->numberBetween(0,1), // Booléen pour Google Drive
            'google_drive_folder_id' => str_replace("'", "''", fake()->uuid()), // UUID aléatoire pour le dossier Google Drive
            'created_at' => fake()->dateTime(), // Date et heure de création aléatoire
        ];
    }

    /**
     * Indicate the number of users for the user_id.
     *
     * @param int $lengthUser
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withParameter($lengthLead,$lengthUser,$lengthCustomer)
    {
        return $this->state(function (array $attributes) use ($lengthUser,$lengthCustomer,$lengthLead) {
            return [
                'lead_id' => fake()->numberBetween(1, $lengthLead), // Peut être mis à jour avec un objet de relation
                'user_id' => fake()->numberBetween(1, $lengthUser), // Peut être mis à jour avec un objet de relation
                'customer_id' => fake()->numberBetween(1, $lengthCustomer), // Peut être mis à jour avec un objet de relation
            ];
        });
    }
}
