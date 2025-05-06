<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images'; // 👈 Correct table name

    protected $fillable = [
        'image_path',
        'title',
        'description',
    ];



// app/Models/Image.php
public function property()
{
    return $this->belongsTo(Property::class);
}



}
