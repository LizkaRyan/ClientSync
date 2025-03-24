<?php

namespace App\Models\Lead;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    public function getInsertString()
    {
        return "INSERT INTO `budget` (
    `name`,
    `budget`,
    `customer_id`
) VALUES (
    '{$this->name}',
    {$this->budget},
    {$this->customer_id}
)";
    }
}
