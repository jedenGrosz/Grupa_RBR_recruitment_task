<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
        'username',
        'email',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'external_id');
    }
}
