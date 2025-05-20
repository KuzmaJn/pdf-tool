<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()
                ->tokens()
                ->get(['id','name','abilities','last_used_at','expires_at'])
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'expires_in' => 'nullable|integer|min:1|max:525600',
        ]);

        $expiration = now()->addMinutes($request->expires_in);

        $tokenResult = $request->user()->createToken(
            $request->name,
            ['*'],
            $expiration
        );

        return response()->json([
            'id'           => $tokenResult->accessToken->id,
            'name'         => $tokenResult->accessToken->name,
            'plainText'    => $tokenResult->plainTextToken,
            'expires_at'   => $tokenResult->accessToken->expires_at,
        ], 201);
    }

    public function destroy(Request $request, $id)
    {
        $request->user()->tokens()->where('id', $id)->delete();
        return response()->json(null, 204);
    }
}
