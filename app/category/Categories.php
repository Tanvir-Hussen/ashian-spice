<?php

namespace App\category;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'category_name', 'cat_image',
    ]; 
    
}
