<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'published_date'
    ];
    public function book()
    {
        return $this->hasMany(Author::class);
     }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
