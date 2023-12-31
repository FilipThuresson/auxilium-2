<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function views() {
        return $this->hasMany(PostVisit::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
