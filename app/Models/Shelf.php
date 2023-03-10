<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;
    protected $table = "shelf";
    protected $primaryKey = "shelf_id";
    protected $fillable = ["book_id","shelf_no","floor"];
}
