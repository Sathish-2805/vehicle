<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index()
    // {
    //     $posts = Post::with('category')->get();
    //     return view('posts.index', compact('posts'));
    // }

    public function index(Request $request)
{
    // Fetch categories for filtering
    $categories = Category::all();
    
    // Determine selected category (if any)
    $categoryId = $request->input('category');
    
    // Fetch posts (filtered by category if provided)
    $posts = $categoryId
        ? Post::with('category')->where('category_id', $categoryId)->get()
        : Post::with('category')->get();

    // Fetch all unique titles for navigation
    $titles = Post::pluck('title');

    return view('posts.index', compact('categories', 'posts', 'categoryId', 'titles'));
}


    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('images', 'public');
        

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->update([
                'image' => $imagePath,
            ]);
        }

        $post->update($request->only('title', 'category_id', 'description'));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
