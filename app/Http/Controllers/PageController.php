<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('type', 'home')->first();
        $rooms = Room::where('home', true)->get();
        $posts = Blog::where('home', true)->get();
        return Inertia::render('Home/Home', [
            'page' => $page,
            'rooms' => $rooms,
            'posts' => $posts,
        ]);
    }
}
