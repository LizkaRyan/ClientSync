<?php

namespace App\Models\Lead;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    public function getInsertString()
    {
        return "INSERT INTO `depense` (
    `amount`,
    `ticket_id`,
    `id_budget`,
    `lead_id`
) VALUES (
    {$this->amount},
    {$this->ticket_id},
    {$this->id_budget},
    {$this->lead_id}
)";
    }
}
