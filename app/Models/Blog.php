<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";
    protected $fillable = ['title','image','menu','content','publisher'];
    use HasFactory;
}
