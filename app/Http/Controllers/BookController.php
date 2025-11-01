<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class BookController extends Controller
{
public function show($id)
{
    $book = Book::with('language', 'category')->findOrFail($id);

    
    $relatedBooks = Book::where('category_id', $book->category_id)
        ->where('id', '!=', $book->id)
        ->take(6)
        ->get();

    return view('frontend.book_show', compact('book', 'relatedBooks'));
}


public function allbooks(Request $request)
{
    $categories = Category::latest()->get();
    $languages = Language::latest()->get();

    $query = Book::with(['category', 'language'])->latest();


    if ($request->has('language_id') && $request->language_id != '') {
        $query->where('language_id', $request->language_id);
    }


    if ($request->has('category_id') && $request->category_id != '') {
        $query->where('category_id', $request->category_id);
    }

    // $books = $query->get();

        $books = $query->paginate(6)->appends($request->all());


    return view('frontend.all_books', compact('books', 'categories', 'languages'));
}




}
