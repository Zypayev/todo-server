<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // These are the only fields we allow the user to change
    protected $fillable = ['title', 'is_completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
