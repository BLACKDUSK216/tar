<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function save(Request $request)
    {
        $request->validate([
            'blog_title' => 'required|string|max:255',
            'blog_content' => 'required|string',
            'blog_file' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:20480', 
        ]);

        if ($request->hasFile('blog_file')) {
            $filePath = $request->file('blog_file')->store('blog_files', 'public');
        } else {
            $filePath = null;
        }

        $blog = new Blog();
        $blog->title = $request->input('blog_title');
        $blog->content = $request->input('blog_content');
        $blog->file = $filePath; 
        $blog->user_id = auth()->id();
        $blog->save();
        return redirect()->back()->with('success', 'Blog published successfully.');
    }
    

}
