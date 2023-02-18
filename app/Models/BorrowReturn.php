<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReturn extends Model
{
    use HasFactory;
    protected $table = "borrowreturned";
    protected $primaryKey = "return_id";
    protected $fillable = ["borrowing_id","user_id","book_id","returned_date","due_date","fine"];
}
