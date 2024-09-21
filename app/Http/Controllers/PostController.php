<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // Show the list of posts
    public function index()
    {
      // $posts = Post::all();
      // $user = Auth::user(); 
      // 
      // return view('posts.index', compact('posts', 'user'));
     $posts = DB::table('posts')->get(); 

        // dd($posts);  
      return view('posts.index', compact('posts')); // Pass posts to the view

    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'date_of_post' => 'required|date',
        ]);

        Post::create([
            'title' => $request->title,
            'text' => $request->text,
            'date_of_post' => $request->date_of_post,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    // Display the specified post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified post
    public function edit(Post $post)
    {
        // Ensure the user can only edit their own posts
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')
                             ->with('error', 'Unauthorized access.');
        }

        return view('posts.edit', compact('post'));
    }

    // Update the specified post in the database
    public function update(Request $request, Post $post)
    {
        // Ensure the user can only update their own posts
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')
                             ->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'date_of_post' => 'required|date',
        ]);

        $post->update([
            'title' => $request->title,
            'text' => $request->text,
            'date_of_post' => $request->date_of_post,
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    // Remove the specified post from the database
    public function destroy(Post $post)
    {
        // Ensure the user can only delete their own posts
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')
                             ->with('error', 'Unauthorized access.');
        }

        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
