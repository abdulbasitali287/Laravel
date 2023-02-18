<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = "borrowing";
    protected $primaryKey = "borrowing_id";
    protected $fillable = ["user_id","book_id","borrowed_date","due_date"];
}
