<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->query('userId');

        if (!$userId) {
            return response()->json(['message' => 'userId query parameter is required'], 400);
        }

        $user = Auth::user();

        if ($user->role !== 'admin' && $user->id != $userId) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $wishlist = Wishlist::where('user_id', $userId)->with('vacationSpot')->get();

        return response()->json($wishlist);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vacation_spot_id' => 'required|numeric|exists:vacation_spots,id',
        ]);

        $user = Auth::user();

        if (Wishlist::where('user_id', $user->id)
            ->where('vacation_spot_id', $request->vacation_spot_id)
            ->exists()) {
            return response()->json(['message' => 'Spot already in wishlist'], 409);
        }

        if (Wishlist::where('user_id', $user->id)->count() === 3) {
            return response()->json(['message' => 'Wishlist limit reached'], 409);
        }

        $wishlist = Wishlist::create([
            'user_id' => $user->id,
            'vacation_spot_id' => $request->vacation_spot_id,
        ]);

        return response()->json($wishlist, 201);
    }
}
