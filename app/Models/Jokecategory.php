<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jokecategory extends Model
{
    use HasFactory;

    protected $table="jokecategories";

    protected $fillable = [
        'name'
    ];
}
