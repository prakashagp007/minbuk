<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
       public function index()
    {
        $languages = Language::latest()->get();
        return view('dashboard.languages', compact('languages'));
    }

    public function store(Request $request)
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

    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('dashboard.language_edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $request->validate([
            'language_name' => 'required|string|max:255',
            'language_code' => 'required|string|max:10|unique:languages,language_code,' . $id,
        ]);

        $language->update($request->only('language_name', 'language_code'));

        return redirect()->route('language.index')->with('success', 'Language updated successfully!');
    }

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return back()->with('success', 'Language deleted successfully!');
    }
}
