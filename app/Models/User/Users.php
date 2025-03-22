<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;
    public function getInsertString():string{
        return "INSERT INTO `users` (`email`, `password`, `hire_date`, `created_at`, `updated_at`, `username`, `status`, `token`, `is_password_set`) VALUES('".$this->email."', '".$this->password."', '".$this->hire_date."', '".$this->created_at."', '".$this->updated_at."', '".$this->username."', '".$this->status."', '".$this->token."', ".$this->is_password_set.")";
    }
}
