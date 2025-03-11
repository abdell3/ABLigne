<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;


    protected $fillable = [
        'title', 
        'slug', 
        'description', 
        'couverture', 
        'langague', 
        'status', 
        'langague', 
        'duration', 
        'difficulty_level', 
        'category_id', 
        'sub_category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    
}
