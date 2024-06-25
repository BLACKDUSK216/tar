<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $maxId = Post::max('id');
            DB::statement("ALTER SEQUENCE posts_id_seq RESTART WITH " . ($maxId + 1));
            $posts = Post::orderBy('id', 'asc')->get();
            return view('posts.index', ['posts' => $posts]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $highestId = Post::max('id');
            Post::create([
            'id' => $highestId + 1, 
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
    
    

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
    
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
    
}
