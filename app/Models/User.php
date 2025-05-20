<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // make one to one relationship
    public function profile() {
        return $this->hasOne(Profile::class, 'user_id');
    }
}


// for create a one to one relationship should have one main table with another table with foregin key on another table.
// migrate the both with making foregin key of primary table implement with unsignedbiginterger and after foregin it with refrence the column on primpary table name with cascading ondelete mean delete if the primary delete
// command for create foregin key wit eloquent
// $table->foregin('nameColumn')->references('namecolumn')->on('primarytablename)->onDelete('cascade);
// both models file of table make function of each other name with in primary add hasOne and return with model of other class with foregin comlumn key, likeways return on another with belongsTo with sameway 
