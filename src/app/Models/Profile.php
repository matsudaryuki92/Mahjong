<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //user_idはいらないかもしれない
    protected $fillable = [
        'user_id',
        'avatar_path',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
