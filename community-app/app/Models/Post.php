<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'nickname', 'user_id', 'type', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
