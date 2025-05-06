<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'city', 'state', 'zip', 'country', 'email', 'phone', 'description'
    ];
<<<<<<< HEAD



    public function images()
    {
        return $this->hasMany(Image::class);
    }
    

=======
    
>>>>>>> 08d23048286da9052358b69b8d1e15dbb96fd314
}
