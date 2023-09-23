<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuBlog extends Model
{
    use HasFactory;
    protected $table = "menu-blog";
    protected $fillable = ['category'];
}
