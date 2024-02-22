<?php

namespace App\Http\Controllers;

use App\Http\Resources\BedResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\RoomResource;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Tag;
use App\Services\OfferService;
use App\Services\ReservationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('type', 'home')->first();

        $rooms = Room::select('id', 'slug', 'name', 'thumb', 'entry', 'adults', 'price', 'home')
            ->with('beds')
            ->where('active', 1)
            ->get();

        $cheap_rooms = $rooms->sortBy('price')->first();

        $rooms_home = $rooms->where('home', true);

        // dd($rooms_home);
        $posts = Blog::with('category:id,name')->where('home', true)->where('active', 1)->get();

        return Inertia::render('Home/Home', [
            'page' => $page,
            'posts' => PostResource::collection($posts),
            'rooms' => RoomResource::collection($rooms_home),
            'cheapRoom' => new RoomResource($cheap_rooms),
        ]);
    }
    public function about()
    {
        $page = Page::where('type', 'about')->first();

        $rooms = Room::select('id', 'name', 'price', 'slug',  'thumb', 'entry', 'adults',  'about')
            ->with('beds')
            ->where('active', 1)
            ->where('about', true)
            ->get();

        return Inertia::render('About/About', [
            'page' => $page,
            'rooms' => RoomResource::collection($rooms),
        ]);
    }
    public function contact()
    {
        $page = Page::where('type', 'contact')->first();

        return Inertia::render('Contact/Contact', [
            'page' => $page,

        ]);
    }
    public function rooms()
    {
        $page = Page::where('type', 'rooms')->first();

        $nights = 7;

        $offer = OfferService::findOffer($nights);

        $rooms = Room::select('id', 'name', 'slug', 'thumb', 'entry', 'adults', 'price')
            ->with('beds', 'amenities')
            ->where('active', 1)
            // ->inRandomOrder()
            ->get()->map(function ($room) use ($offer, $nights) {

                return [
                    'id' => $room->id,
                    'name' => $room->name,
                    'slug' => $room->slug,
                    'thumb' => $room->thumb,
                    'entry' => $room->entry,
                    'adults' => $room->adults,
                    'price' => $room->price,
                    'beds' => BedResource::collection($room->beds),
                    'amenities' => $room->amenities,
                    'nights' => $nights,
                    'charge' => ReservationService::totalCalculation($room->price, $nights, $offer)
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
            ->where('active', 1)
            ->firstOrFail();

        $nights = 7;
        $offer = OfferService::findOffer($nights);
        $charge = ReservationService::totalCalculation($room->price, $nights, $offer);


        $recommendedRooms = Room::with('beds')
            ->inRandomOrder()->limit(3)
            ->where('active', 1)
            ->whereNot('slug', $slug)->get();

        return Inertia::render('RoomSingle/RoomSingle', [
            'room' => new RoomResource($room),
            'charge' => $charge,
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
    public function blog(Request $request)
    {
        $page = Page::where('type', 'blog')->firstOrFail();
        $categories = Category::select('id', 'slug', 'name')->where('active', 1)->get();
        $tags = Tag::select('id', 'slug', 'name')->where('active', 1)->get();

        $category_slug = $request->category;
        $tag_slug = $request->tag;
        $search = $request->search;

        $posts = Blog::with('category:id,name')->where('active', 1)
            ->when($category_slug, function (Builder $query, string $category_slug) {
                $query->whereRelation('category', 'slug', $category_slug);
            })
            ->when($search, function (Builder $query, string $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->when($tag_slug, function (Builder $query, string $tag_slug) {
                $query->whereRelation('tags', 'slug', $tag_slug);
            })->get();

        $postsRecommended = Blog::where('active', 1)
            ->inRandomOrder()->limit(3)
            ->get();

        return Inertia::render('Blog/Blog', [
            'page' => $page,
            'categories' => $categories,
            'tags' => $tags,
            'posts' => PostResource::collection($posts),
            'postsRecommended' => PostResource::collection($postsRecommended),
            'filters' => $request->only('category', 'tag', 'search'),

        ]);
    }

    public function post($slug)
    {
        $categories = Category::select('id', 'slug', 'name')->where('active', 1)->get();
        $tags = Tag::select('id', 'slug', 'name')->where('active', 1)->get();

        $post = Blog::with('category:id,name', 'tags:id,name')
            ->where('active', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        $postsRecommended = Blog::select('id', 'title', 'slug', 'thumb', 'updated_at')->where('active', 1)
            ->whereNot('id', $post->id)
            ->inRandomOrder()->limit(3)
            ->get();


        return Inertia::render('Post/Post', [
            'categories' => $categories,
            'tags' => $tags,
            'postsRecommended' => PostResource::collection($postsRecommended),
            'filters' => [],

            'post' => new PostResource($post),

        ]);
    }
    public function legalPolicies()
    {
        $page = Page::where('type', 'legal-policies')->first();
        return Inertia::render('LegalPolicies/LegalPolicies', [
            'page' => $page
        ]);
    }
}
