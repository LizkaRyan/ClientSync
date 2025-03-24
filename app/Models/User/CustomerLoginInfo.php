<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLoginInfo extends Model
{
    use HasFactory;
    public function getInsertString():string{
        return "INSERT INTO `customer_login_info` (`password`, `username`, `token`, `password_set`) VALUES('".$this->password."', '".$this->username."', '".$this->token."', ".$this->password_set.")";
    }
}
