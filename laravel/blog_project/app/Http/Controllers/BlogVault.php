<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;


class BlogVault extends Controller
{
    public function route()
    {
        return view('blogvault');
    }

    public function index()
    {
        $blogs = Blog::join('users', 'blogs.user_id', '=', 'users.id')
                     ->select('blogs.*', 'users.name', 'users.email')
                     ->get();

        return view('blogvault', ['blogs' => $blogs]);
    }
}
