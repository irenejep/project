<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }
    
}
