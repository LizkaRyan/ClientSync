<?php

namespace Database\Factories\lead;

use App\Models\Lead\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetFactory extends Factory
{

    protected $model = Budget::class;

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'name' => str_replace("'", "''", fake()->name()), // Nom aléatoire
            'budget' => fake()->numberBetween(5000, 15000),
        ];
    }

    /**
     * Indicate the number of users for the user_id.
     *
     * @param int $lengthCustomer
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withParameter($lengthCustomer)
    {
        return $this->state(function (array $attributes) use ($lengthCustomer) {
            return [
                'customer_id' => fake()->numberBetween(43, 42+$lengthCustomer), // Peut être mis à jour avec un objet de relation
            ];
        });
    }
}
