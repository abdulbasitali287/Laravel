<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "book_id";
    protected $fillable = ["title","author","publisher","dob_of_publication","category_id"];
}
