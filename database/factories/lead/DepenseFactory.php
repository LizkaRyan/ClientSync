<?php

namespace Database\Factories\lead;

use App\Models\Lead\Depense;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepenseFactory extends Factory
{

    protected $model = Depense::class;

    public function definition()
    {
        return [
            'amount' => fake()->numberBetween(1000, 5000), // Montant aléatoire
        ];
    }

    /**
     * Indicate the number of users for the user_id.
     *
     * @param int $lengthUser
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withParameter($lengthTicket,$lengthBudget,$lengthLead)
    {
        return $this->state(function (array $attributes) use ($lengthTicket,$lengthBudget,$lengthLead) {
            $rand=fake()->numberBetween(0,20);
            $idTicket = fake()->numberBetween(47, 46+$lengthTicket);
            $idLead = fake()->numberBetween(56, 55+$lengthLead);
            if($rand%2==0){
                $idLead = 'null';
            }
            else{
                $idTicket = 'null';
            }
            return [
                'ticket_id' => $idTicket, // ID du client aléatoire
                'id_budget' => fake()->numberBetween(1, $lengthBudget),
                'lead_id' => $idLead,
            ];
        });
    }
}
