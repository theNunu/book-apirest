<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'year', 'state'];

    public function scopeActivos($query)
    {
        return $query->where('state', 1);
    }
}
