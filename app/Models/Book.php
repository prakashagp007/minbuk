<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
     protected $fillable = [
        'bookname',
        'author',
        'reference',
        'pages_count',
        'book_id',
        'image',
        'pdf_link',
        'category_id',
        'language_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
