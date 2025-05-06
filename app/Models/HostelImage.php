<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostelImage extends Model
{
    //
    protected $table = 'Hostels_Images';

    protected $fillable = [
        'title',
        'image',
    ];
}
