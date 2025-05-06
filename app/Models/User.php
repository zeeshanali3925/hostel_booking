<<<<<<< HEAD
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
<?php 

namespace App\Models;

>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

<<<<<<< HEAD
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
        'first_name', 'last_name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
=======
class User extends Authenticatable {
    use HasFactory, Notifiable;

  
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];


>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
    protected $hidden = [
        'password',
        'remember_token',
    ];
<<<<<<< HEAD

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
=======
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
}
