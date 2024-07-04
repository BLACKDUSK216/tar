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
    }    public function blog2()
    {
        return view('blog2');
    }
    public function saveBlog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_content' => 'required|string',
            'blog_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);
        $filePath = null;
        if ($request->hasFile('blog_file')) {
            $filePath = $request->file('blog_file')->store('blogs', 'public');
        }
        $userId = Auth::id();
        $blog = new Blog();
        $blog->title = $request->blog_title;
        $blog->content = $request->blog_content;
        $blog->file = $filePath;
        $blog->user_id = $userId;
        $blog->save();
        return redirect()->route('user_dashboard')->with('success', 'Blog post published successfully!');
    }

}
