<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify the table name (optional if it matches Laravel's naming convention)
    protected $table = 'categories';

    // Allow mass assignment for the category_name field
    protected $fillable = ['category_name'];

    /**
     * Define the relationship with the Post model.
     * A category can have many posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}

