<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    

    const EXCERPT_LENGTH = 100; //excerpt length

    protected $fillable = [
        'body'
    ];

    //fucntion for excerpt
    public function excerpt()
    {
        return Str::limit($this->body, Post::EXCERPT_LENGTH);
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);
    }

    // public function ownedBy(User $user){
    //    return $user->id === $this->user_id;
    // }



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
