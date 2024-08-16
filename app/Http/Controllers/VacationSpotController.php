<?php

namespace App\Http\Controllers;

use App\Models\VacationSpot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationSpotController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(VacationSpot::all());
    }

    public function store(Request $request): JsonResponse
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $request->validate([
            'title' => 'required|string|unique:vacation_spots|max:200',
            'latitude' => 'required|decimal:4,8|between:-90,90',
            'longitude' => 'required|decimal:4,8|between:-180,180',
        ]);

        $vacationSpot = VacationSpot::create($request->all());

        return response()->json($vacationSpot, 201);
    }
}
