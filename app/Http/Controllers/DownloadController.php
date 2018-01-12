<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function show(Category $category)
    {
        return view('download.show')->with('category', $category);
    }

    public function index()
    {
        $categories = Category::all();
        return view('download.index')->with('categories', $categories);
    }
}
