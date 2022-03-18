<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'status'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
