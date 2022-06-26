<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//model
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id'
    ];

    public function likedBy(User $user)
    {
        # code...
        return $this->likes->contains('user_id', $user->id);
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    public function likes(Type $var = null)
    {
        # code...
        return $this->hasMany(Like::class);
    }
}
