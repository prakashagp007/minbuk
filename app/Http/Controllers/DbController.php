<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use App\Models\Book;


class DbController extends Controller
{
    // Show main admin dashboard with categories
  public function home()
{
    $categories = Category::latest()->get();
    $languages = Language::latest()->get();
    $books = Book::with(['category', 'language'])
        ->latest()
        ->take(10)
        ->get();

    return view('dashboard.db_home', compact('categories','languages','books'));
}





    // Create new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/categories'), $imageName);
            $data['image'] = 'uploads/categories/' . $imageName;
        }

        Category::create($data);

        return redirect('/admin')->with('success', 'Category added successfully!');
    }

    // Edit view
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.category_edit', compact('category'));
    }

    // Update category
    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/categories'), $imageName);
            $category->image = 'uploads/categories/' . $imageName;
        }

        $category->save();

        return redirect('/admin')->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $category->delete();

        return redirect('/admin')->with('success', 'Category deleted successfully!');
    }


    // language

     public function lstore(Request $request)
    {
        $request->validate([
            'language_name' => 'required|string|max:255',
            'language_code' => 'required|string|max:10|unique:languages',
        ]);

        Language::create([
            'language_name' => $request->language_name,
            'language_code' => $request->language_code,
        ]);

        return back()->with('success', 'Language added successfully!');
    }

    public function ledit($id)
    {
        $language = Language::findOrFail($id);
        return view('dashboard.language_edit', compact('language'));
    }

    public function lupdate(Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $request->validate([
            'language_name' => 'required|string|max:255',
            'language_code' => 'required|string|max:10|unique:languages,language_code,' . $id,
        ]);

        $language->update($request->only('language_name', 'language_code'));

return redirect('/admin')->with('success', 'language updated successfully!');
    }

    public function ldestroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return back()->with('success', 'Language deleted successfully!');
    }

 public function bookstore(Request $request)
{
    $request->validate([
        'bookname'     => 'required|string|max:255',
        'author'       => 'nullable|string|max:255',
        'reference'    => 'nullable|string|max:255',
        'pages_count'  => 'nullable|integer',
        'book_id'      => 'required|string',
        'category_id'  => 'required|integer',
        'language_id'  => 'required|integer',
        'pdf_link'     => 'nullable|url',
        'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->all();

    // ✅ Image upload handling
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/books'), $fileName);
        $data['image'] = 'uploads/books/' . $fileName;
    }

    Book::create($data);

        return redirect('/admin')->with('success', 'Books stored successfully!');
}

      public function bookedit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $languages = Language::all();
        return view('dashboard.books_edit', compact('book', 'categories', 'languages'));
    }

    public function bookupdate(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $request->validate([
        'bookname' => 'required|string|max:255',
        'book_id' => 'required|string|unique:books,book_id,' . $book->id,
        'category_id' => 'required|exists:categories,id',
        'language_id' => 'required|exists:languages,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->all();

    // ✅ Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($book->image && file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }

        $file = $request->file('image');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/books'), $fileName);

        // store relative path for easy access in views
        $data['image'] = 'uploads/books/' . $fileName;
    }

    $book->update($data);

        return redirect('/admin')->with('success', 'Books updated successfully!');
}

    public function bookdestroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return back()->with('success', 'Book deleted successfully!');
    }
}
