<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('categories.index', compact('categories')); // Pass data to the view
    }

    public function create()
    {
        
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            
        ]);
    
        
        Category::create([
            'category_name' => $request->category_name,
            
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
       
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            
        ]);

        

        $category->update($request->only('category_name'));
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

