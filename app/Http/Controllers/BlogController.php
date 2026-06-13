<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->where('published', 1)->latest()->get();

        return view('pages.blog', compact('blogs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('pages.blog-detail.index', compact('blog'));
    }

}
