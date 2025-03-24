<?php

namespace App\Models\Lead;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function getInsertString()
    {
        return "INSERT INTO `trigger_contract` (
    `subject`,
    `status`,
    `description`,
    `start_date`,
    `end_date`,
    `amount`,
    `google_drive`,
    `google_drive_folder_id`,
    `lead_id`,
    `user_id`,
    `customer_id`,
    `created_at`
) VALUES (
    '{$this->subject}',
    '{$this->status}',
    '{$this->description}',
    '{$this->start_date}',
    '{$this->end_date}',
    {$this->amount},
    {$this->google_drive},
    '{$this->google_drive_folder_id}',
    {$this->lead_id},
    {$this->user_id},
    {$this->customer_id},
    '{$this->created_at}'
)";
    }
}
