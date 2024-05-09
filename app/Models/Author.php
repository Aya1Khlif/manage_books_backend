<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'website'
    ];
    public function Author ()
    {
      return $this->hasMany(book::class);
    }
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

}
