<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;



class Frontendcontroller extends Controller
{
    //

    public function home()
    {
        // Fetch all categories from DB
        $categories = Category::latest()->get();
$books = Book::with('language', 'category')->latest()->take(6)->get();
        // Pass to frontend.home view
        return view('frontend.home', compact('categories','books'));
    }

       public function show($id)
{
    $book = Book::with('language', 'category')->findOrFail($id);
    return view('frontend.book_show', compact('book'));
}

}
