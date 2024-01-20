<?php

namespace App\Http\Controllers;

use App\Http\Resources\BedResource;
use App\Http\Resources\RoomResource;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Room;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('type', 'home')->first();

        $rooms = Room::select('id', 'slug', 'name', 'thumb', 'entry', 'adults', 'price', 'home')->where('active', 1)->get();

        $cheap_rooms = $rooms->sortBy('price')->first();
        $rooms_home = $rooms->where('home', true)->values();

        $posts = Blog::where('home', true)->where('active', 1)->get()->map(function ($item) {

            $item->time = $item->updated_at->diffForHumans();
            return $item;
        });
        return Inertia::render('Home/Home', [
            'page' => $page,
            'posts' => $posts,
            'rooms' => RoomResource::collection($rooms_home),
            'cheapRoom' => new RoomResource($cheap_rooms),
        ]);
    }
    public function about()
    {
        $page = Page::where('type', 'about')->first();

        $rooms = Room::select('id', 'name', 'price', 'slug',  'thumb', 'entry', 'adults', 'price', 'about')
            ->where('active', 1)
            ->where('about', true)
            ->get();

        return Inertia::render('About/About', [
            'page' => $page,
            'rooms' => RoomResource::collection($rooms),
        ]);
    }
    public function rooms()
    {
        $page = Page::where('type', 'rooms')->first();

        $nights = 7;

        $offer = OfferService::findOffer($nights);

        $rooms = Room::select('id', 'name', 'slug', 'thumb', 'entry', 'adults', 'price')
            ->with('beds')
            ->where('active', 1)
            ->get()->map(function ($room) use ($offer, $nights) {

                $price_offer = OfferService::calculateOffer($room->price, $offer, $nights);
                return [
                    'id' => $room->id,
                    'name' => $room->name,
                    'slug' => $room->slug,
                    'thumb' => $room->thumb,
                    'entry' => $room->entry,
                    'adults' => $room->adults,
                    'price' => Number::currency($room->price),
                    'beds' => BedResource::collection($room->beds),
                    'price_7_night' => [
                        'percent' => $offer->percent,
                        'nights' => $nights,
                        'price_offer' => Number::currency($price_offer)
                    ]
                ];
            });


        return Inertia::render('Rooms/Rooms', [
            'page' => $page,
            'rooms' => $rooms,
        ]);
    }
    public function room($slug)
    {
        $room = Room::with('beds', 'images', 'amenities')
            ->where('slug', $slug)
            ->where('active', 1)->firstOrFail();

        $recommendedRooms = Room::with('beds')
            ->inRandomOrder()->limit(3)
            ->where('active', 1)
            ->whereNot('slug', $slug)->get();

        return Inertia::render('RoomSingle/RoomSingle', [
            'room' => new RoomResource($room),
            'recommendedRooms' => RoomResource::collection($recommendedRooms),
        ]);
    }
    public function gallery()
    {
        $page = Page::where('type', 'gallery')->firstOrFail();
        $galleries = Gallery::with('images')->get();

        return Inertia::render('Gallery/Gallery', [
            'page' => $page,
            'galleries' => $galleries

        ]);
    }
}
