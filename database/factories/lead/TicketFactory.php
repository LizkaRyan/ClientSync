<?php

namespace Database\Factories\lead;

use App\Models\Lead\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    // Ajouter des paramètres à la méthode definition
    public function definition()
    {
        return [
            'subject' => str_replace("'", "''", fake()->sentence(3)), // Sujet aléatoire
            'description' => str_replace("'", "''", fake()->paragraph(3)), // Description aléatoire
            'status' => fake()->randomElement(['Open', 'In Progress', 'Closed', 'Pending']), // Statut aléatoire
            'priority' => fake()->randomElement(['Low', 'Medium', 'High', 'Critical']), // Priorité aléatoire
            'customer_id' => null, // Peut être défini via des relations
            'manager_id' => null, // Peut être défini via des relations
            'employee_id' => null, // Peut être défini via des relations
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'), // Date de création aléatoire
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
                'customer_id' => fake()->numberBetween(43, 42+$lengthCustomer), // Peut être défini via des relations
                'manager_id' => fake()->numberBetween(53, 52+$lengthUser), // Peut être défini via des relations
                'employee_id' => fake()->numberBetween(53, 52+$lengthUser), // Peut être défini via des relations
            ];
        });
    }
}
