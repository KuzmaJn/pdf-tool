<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::with('user')->latest()->paginate(10); // ja chcem vsetko
        return view('history.index', compact('histories'));
    }

    public function show($id)
    {
        return History::findOrFail($id);    // zatial nepotrebne
    }

    public function export()
    {
        $histories = History::with('user')->get();
        // Header row
        $csvData = "ID,User Email,Service ID,Interface,Used At,Location,Created At\n";

        foreach ($histories as $history) {
            // User Email or user_id fallback
            $userEmail = $history->user && $history->user->email ? $history->user->email : $history->user_id;
            // Prepare all columns
            $row = [
                $history->id,
                $userEmail,
                $history->service_id,
                $history->interface,
                $history->used_at,
                $history->location,
            ];
            // Escape fields: wrap in quotes if contains comma or newline or quote, and escape quotes
            foreach ($row as &$field) {
                $field = (string) $field;
                if (strpos($field, '"') !== false) {
                    $field = str_replace('"', '""', $field);
                }
                if (strpos($field, ',') !== false || strpos($field, "\n") !== false || strpos($field, "\r") !== false || strpos($field, '"') !== false) {
                    $field = "\"$field\"";
                }
            }
            unset($field);
            $csvData .= implode(',', $row) . "\n";
        }

        $fileName = 'history_export_' . now()->format('Y_m_d_H_i_s') . '.csv';

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }

//    public function store(Request $request)
//    {
//        $validated = $request->validate([
//            'user_id' => 'required|exists:users,user_id',
//            'service_id' => 'required|string',
//            'interface' => 'required|string',
//            'used_at' => 'required|date',
//            'location' => 'required|string',
//        ]);
//
//        $history = History::create($validated);
//
//        return response()->json($history, 201);
//    }

//    public function update(Request $request, $id)
//    {
//        $history = History::findOrFail($id);
//        $history->update($request->all());
//
//        return response()->json($history);
//    }

//    public function destroy($id)
//    {
//        History::destroy($id);
//        return response()->json(null, 204);
//    }

    public function destroyAll()
    {
        History::truncate();
        return redirect()->route('history.index')->with('status', 'All history records have been deleted.');
    }
}
