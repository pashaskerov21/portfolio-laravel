<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'image', 'preview_link', 'github_link', 'github_status', 'text', 'sort'];
}
