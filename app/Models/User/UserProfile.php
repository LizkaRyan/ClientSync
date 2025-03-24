<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    public function getInsertString():string{
        return "INSERT INTO `user_profile`(`first_name`, `last_name`, `phone`, `department`, `salary`, `status`, `oauth_user_image_link`, `user_image`, `bio`, `youtube`, `twitter`, `facebook`, `user_id`, `country`, `position`, `address`) VALUES('".$this->first_name."', '".$this->last_name."', '".$this->phone."', '".$this->department."', ".$this->salary.", '".$this->status."', '".$this->oauth_user_image_link."', '".$this->user_image."', '".$this->bio."', '".$this->youtube."', '".$this->twitter."', '".$this->facebook."', ".$this->user_id.", '".$this->country."', '".$this->position."', '".$this->address."')";
    }
}
