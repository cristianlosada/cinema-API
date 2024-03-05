<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model // Or the name of the class in your project
{
    use HasFactory;

    protected $table = 'movies'; // Or the name of the table in your database

    protected $fillable = [
        'title',
        'description',
        'director',
        'genre',
        'release_date',
        'poster_image', // If the table has a field for the image
    ];

    // Relationships

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Additional methods (optional)

    public function getAverageRating()
    {
        // Code to calculate the average rating of the movie
    }

    public function getGenres()
    {
        // Code to get a list of genres from the "genre" field
    }
}

