<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class TokenInvalidyak
{
 
    public function handle(Request $request, Closure $next): Response
    {
        // return response()->json(['message' => 'Token not provided'], Response::HTTP_UNAUTHORIZED);
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['message' => 'Token not provided']);
        }

        $tokenId = explode('|', $token, 2)[0];
        $personalAccessToken = PersonalAccessToken::find($tokenId);

        if (!$personalAccessToken || $personalAccessToken->expires_at < now()) {
            return response()->json(['message' => 'Token has expired']);
        }

        return $next($request);
    }
}
