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

        $rooms = Room::select('id', 'name', 'thumb', 'entry', 'adults', 'price', 'home')->where('active', 1)->get();

        $cheap_rooms = $rooms->sortBy('price')->first();
        $rooms_home = $rooms->where('home', true)->values();

        $posts = Blog::where('home', true)->where('active', 1)->get()->map(function ($item) {

            $item->time = $item->updated_at->diffForHumans();
            return $item;
        });
        return Inertia::render('Home/Home', [
            'page' => $page,
            'rooms' => $rooms_home,
            'posts' => $posts,
            'cheapRoom' => $cheap_rooms,
        ]);
    }
    public function about()
    {
        $page = Page::where('type', 'about')->first();

        $rooms = Room::select('id', 'name', 'thumb', 'entry', 'adults', 'price', 'about')
            ->where('active', 1)
            ->where('about', true)
            ->get();

        return Inertia::render('About/About', [
            'page' => $page,
            'rooms' => $rooms,

        ]);
    }
    public function rooms()
    {
        $page = Page::where('type', 'rooms')->first();

        $rooms = Room::select('id', 'name', 'slug', 'thumb', 'entry', 'adults', 'price')
            ->where('active', 1)
            ->get();

        return Inertia::render('Rooms/Rooms', [
            'page' => $page,
            'rooms' => $rooms,

        ]);
    }
    public function room()
    {
        $page = Page::where('type', 'rooms')->first();

        $rooms = Room::select('id', 'name', 'slug', 'thumb', 'entry', 'adults', 'price')
            ->where('active', 1)
            ->get();

        return Inertia::render('Rooms/Rooms', [
            'page' => $page,
            'rooms' => $rooms,

        ]);
    }
}
