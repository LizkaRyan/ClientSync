<?php

namespace App\Models\Lead;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    public function getInsertString()
    {
        return "INSERT INTO `trigger_lead` (
    `customer_id`,
    `user_id`,
    `name`,
    `phone`,
    `employee_id`,
    `status`,
    `meeting_id`,
    `google_drive`,
    `google_drive_folder_id`,
    `created_at`
) VALUES (
    " .$this->customer_id.",
    " .$this->user_id.",
    '".$this->name."',
    '".$this->phone."',
    ".$this->employee_id.",
    '".$this->status."',
    '".$this->meeting_id."',
    ".$this->google_drive.",
    '".$this->google_drive_folder_id."',
    '$this->created_at'
)";
    }
}
