<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::where('status', 'published')->orderBy('submitted_at', 'desc')->get();
        return view('home', compact('reviews'));
    }
}
