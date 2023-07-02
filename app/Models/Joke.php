<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'joke_story',
        'joke_story_hindi',
        'joke_story_url',
        'joke_category_id',
        'status',
        'is_publish',
        'type',
        'tag',
        'author'

    ];

}
