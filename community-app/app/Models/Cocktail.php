<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'recipes', 'materials'];

    public function getRecipesAttribute($value)
    {
        return explode(',', $value);
    }

    public function setRecipesAttribute($value)
    {
        $this->attributes['recipes'] = implode(',', $value);
    }

    public function getMaterialsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setMaterialsAttribute($value)
    {
        $this->attributes['materials'] = implode(',', $value);
    }
}