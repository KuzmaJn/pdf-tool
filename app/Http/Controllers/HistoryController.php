<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;


class HistoryController extends Controller
{
    public function index()
    {
        return History::all();
    }

    public function show($id)
    {
        return History::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'service_id' => 'required|string',
            'interface' => 'required|string',
            'used_at' => 'required|date',
            'location' => 'required|string',
        ]);

        $history = History::create($validated);

        return response()->json($history, 201);
    }

    public function update(Request $request, $id)
    {
        $history = History::findOrFail($id);
        $history->update($request->all());

        return response()->json($history);
    }

    public function destroy($id)
    {
        History::destroy($id);
        return response()->json(null, 204);
    }

}
