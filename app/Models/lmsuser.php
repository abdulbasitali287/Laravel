<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lmsuser extends Model
{
    use HasFactory;
    protected $table = "lmsusers";
    protected $primaryKey = "user_id";
    protected $fillable = ["name","gender","email","password","phone","address","image"];
}
