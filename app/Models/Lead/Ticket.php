<?php

namespace App\Models\Lead;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function getInsertString():string{
        return "INSERT INTO `trigger_ticket` (
    `subject`,
    `description`,
    `status`,
    `priority`,
    `customer_id`,
    `manager_id`,
    `employee_id`,
    `created_at`
) VALUES (
    '{$this->subject}',
    '{$this->description}',
    '{$this->status}',
    '{$this->priority}',
    {$this->customer_id},
    {$this->manager_id},
    {$this->employee_id},
    '{$this->created_at}'
)";
    }
}
