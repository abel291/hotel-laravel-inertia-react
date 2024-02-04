<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Contracts\Database\Query\Builder;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->q;
        $rooms = Room::with('amenities', 'beds')->when($request->q, function (Builder $query,) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->orderBy('id', 'desc')->paginate(24)->withQueryString();

        return Inertia::render('Dashboard/Rooms/RoomList', [
            'rooms' => RoomResource::collection($rooms),
            'filters' => $request->only(['q']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        dd($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
