<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whisky extends Model
{
    use HasFactory;
    protected $table = 'whiskies';
    protected $fillable = ['post_id', 'region', 'alcohol', 'material'];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
