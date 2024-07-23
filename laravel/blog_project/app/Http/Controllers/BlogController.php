<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs');
    }

    public function africa()
    {
        return view('africa');
    }
    public function america()
    {
        return view('america');
    }
    public function japan()
    {
        return view('japan');
    }
    public function sydney()
    {
        return view('sydney');
    }
    public function blog1()
    {
        return view('blog1');
    }
    public function blog2()
    {
        return view('blog2');
    }
    // Method to show the form for creating a new blog post
    public function create()
    {
        return view('blogs.create');
    }

    // Method to save a new blog post or update an existing one
    public function saveBlog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_content' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'blog_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $blog = new Blog();
        $blog->title = $request->blog_title;
        $blog->content = $request->blog_content;

        // Handle image upload if provided
        if ($request->hasFile('blog_image')) {
            $imagePath = $request->file('blog_image')->store('blogs/images', 'public');
            $blog->image_data = $imagePath; // Assuming 'image_data' is a column in your Blog model for storing image path
        }

        // Handle file upload if provided
        if ($request->hasFile('blog_file')) {
            $filePath = $request->file('blog_file')->store('blogs/files', 'public');
            $blog->file = $filePath;
        }

        $blog->user_id = Auth::id();
        $blog->save();

        return redirect()->route('user.user_blogs')->with('success', 'Blog post published successfully!');
    }

    // Method to show the edit form for a specific blog post
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', ['blog' => $blog]);
    }

    // Method to update an existing blog post
    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_content' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'blog_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->blog_title;
        $blog->content = $request->blog_content;

        // Handle image upload if provided
        if ($request->hasFile('blog_image')) {
            // Delete old image if exists
            if ($blog->image_data) {
                Storage::disk('public')->delete($blog->image_data);
            }
            $imagePath = $request->file('blog_image')->store('blogs/images', 'public');
            $blog->image_data = $imagePath;
        }

        // Handle file upload if provided
        if ($request->hasFile('blog_file')) {
            // Delete old file if exists
            if ($blog->file) {
                Storage::disk('public')->delete($blog->file);
            }
            $filePath = $request->file('blog_file')->store('blogs/files', 'public');
            $blog->file = $filePath;
        }

        $blog->save();

        return redirect()->route('user.user_blogs')->with('success', 'Blog post updated successfully!');
    }

    // Method to delete a specific blog post
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete associated image if exists
        if ($blog->image_data) {
            Storage::disk('public')->delete($blog->image_data);
        }

        // Delete associated file if exists
        if ($blog->file) {
            Storage::disk('public')->delete($blog->file);
        }

        $blog->delete();

        return redirect()->route('user.user_blogs')->with('success', 'Blog post deleted successfully!');
    }

}
