<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Specify the table name (optional if it matches Laravel's naming convention)
    protected $table = 'posts';

    // Allow mass assignment for the fields
    protected $fillable = ['title', 'category_id', 'description', 'image'];

    /**
     * Define the relationship with the Category model.
     * A post belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

