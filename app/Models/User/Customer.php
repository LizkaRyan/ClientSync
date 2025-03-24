<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function getInsertString(){
        return "INSERT INTO `customer` (`name`, `phone`, `address`, `city`, `state`, `country`, `user_id`, `description`, `position`, `twitter`, `facebook`, `youtube`, `created_at`, `email`, `profile_id`) VALUES('{$this->name}', '{$this->phone}', '{$this->address}', '{$this->city}', '{$this->state}', '{$this->country}', {$this->user_id}, '{$this->description}', '{$this->position}', '{$this->twitter}', '{$this->facebook}', '{$this->youtube}', '{$this->created_at}', '{$this->email}', {$this->profile_id})";
    }
}
