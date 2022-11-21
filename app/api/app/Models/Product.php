<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //Con esto decimos que solo vamos a permitir que el usuario pueda llenar estos datos
    protected $fillable = ['description', 'price', 'stock'];
}
