<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    // making one to one relationship
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
   