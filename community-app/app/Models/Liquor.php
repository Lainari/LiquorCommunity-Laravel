<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquor extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'character', 'region', 'alcohol'];

    public function getCharacterAttribute($value)
    {
        return explode(',', $value);
    }

    public function setCharacterAttribute($value)
    {
        $this->attributes['character'] = implode(',', $value);
    }
}
