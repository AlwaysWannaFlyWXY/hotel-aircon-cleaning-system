<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(Request $request): View
    {
        $floor = (int) $request->input('floor', 18);
        abort_unless($floor >= 18 && $floor <= 31, 404);

        $rooms = Room::where('floor', $floor)->orderBy('number')->get();

        return view('rooms.index', [
            'rooms' => $rooms,
            'floor' => $floor,
            'totalCleaned' => Room::where('status', 'cleaned')->count(),
            'totalRooms' => Room::count(),
        ]);
    }

    public function createCleaning(Room $room): View|RedirectResponse
    {
        if ($room->status === 'cleaned') {
            return redirect()->route('rooms.index', ['floor' => $room->floor])
                ->with('notice', "{$room->number}号室はすでに清掃済みです。");
        }

        return view('rooms.clean', compact('room'));
    }

    public function storeCleaning(Request $request, Room $room): RedirectResponse
    {
        $data = $request->validate([
            'cleaned_by' => ['required', 'string', 'max:100'],
        ]);

        $cleanedAt = now();

        $room->update([
            'status' => 'cleaned',
            'cleaned_at' => $cleanedAt,
            'cleaned_by' => $data['cleaned_by'],
        ]);

        $room->cleaningRecords()->create([
            'cleaned_by' => $data['cleaned_by'],
            'cleaned_at' => $cleanedAt,
        ]);

        return redirect()->route('rooms.index', ['floor' => $room->floor])
            ->with('success', "{$room->number}号室のエアコン清掃を登録しました。");
    }
}
