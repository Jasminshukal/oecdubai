<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    public function getEntityImageAttribute($value)
    {
        return asset("images/home_page/".$value);
    }
}
